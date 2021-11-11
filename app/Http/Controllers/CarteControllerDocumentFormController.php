<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarteConsulaireFormRequest;
use App\Mail\DemandCreated;
use App\Models\Demand;
use App\Models\Document;
use App\Models\DocumentForm;
use App\Models\Enclosed;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Kkiapay\Kkiapay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CarteControllerDocumentFormController extends Controller
{
    public function store(CarteConsulaireFormRequest $request, Document $document) {
        $demand = Demand::create([
            'document_id' => $document->id,
            'status' => 'invalid',
            'payment_token' => Str::random(6),
        ]);
        $name = $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->store('public/enclosed');
        Enclosed::create([
            'name' => $name,
            'path' => $path,
            'label' => 'Photo d\'identité',
            'demand_id' => $demand->id,
        ]);
        $documentForm = DocumentForm::create(Arr::add($request->except('photo'), 'demand_id', $demand->id));
        Mail::to($documentForm->email)->send(new DemandCreated($demand));
        return response()->json(['payment_token' => $demand->payment_token, 'nom' => $documentForm->last_name, 'prenom' => $documentForm->first_name, 'demandId' => $demand->id], 201);
    }

    public function payment(Request $request)
    {
        $kkiapay = new Kkiapay("206caa702ce811ecb30d13c7d805295f", "tpk_206caa722ce811ecb30d13c7d805295f", "tsk_206cd1802ce811ecb30d13c7d805295f", $sandbox = true);
        $transaction =  $kkiapay->verifyTransaction($request->transaction_id);
        if (!$transaction) {
            return redirect()->route('/')->with('errors', 'Le paiement a échoué veuilez réesayer');
        }

        if ($transaction->status == 'TRANSACTION_NOT_FOUND') {
            return redirect()->route('/')->with('errors', 'Transaction erronée');
        }

        if ($transaction->status != 'SUCCESS') {
            return redirect()->route('/')->with('errors', 'Transaction erronée');
        }

        $demand = Demand::where('payment_token', $transaction->state->uniqueId)->firstOrFail();
        $amount = $demand->document->price;
        if ($transaction->amount < $amount) {
            return redirect()->route('/')->with('errors', 'Erreur ! Le montant payé est inférieur au montant dû');
        }

        $demand->status = 'en-attente';
        $demand->transaction_id = $request->transaction_id;
        $demand->save();
        return redirect('/')->with('success', 'Votre demande a été créée avec succès. Voici le code de cette dernière: "<strong>'. $demand->payment_token. '</strong>". Il vous permettra de suivre l\'avancement du traitement de votre demande.');
    }
}
