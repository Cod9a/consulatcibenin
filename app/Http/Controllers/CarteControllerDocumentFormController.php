<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarteConsulaireFormRequest;
use App\Models\Demand;
use App\Models\Document;
use App\Models\DocumentForm;
use App\Models\Enclosed;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Kkiapay\Kkiapay;
use Illuminate\Http\Request;

class CarteControllerDocumentFormController extends Controller
{
    public function store(CarteConsulaireFormRequest $request, Document $document) {
        $demand = Demand::create([
            'document_id' => $document->id,
            'status' => 'invalid',
            'payment_token' => Str::uuid(),
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
        return response()->json(['payment_token' => $demand->payment_token, 'nom' => $documentForm->last_name, 'prenom' => $documentForm->first_name, 'demandId' => $demand->id], 201);
    }

    public function payment(Request $request)
    {
        $kkiapay = new Kkiapay("206caa702ce811ecb30d13c7d805295f", "tpk_206caa722ce811ecb30d13c7d805295f", "tsk_206cd1802ce811ecb30d13c7d805295f", $sandbox = true);
        $transaction =  $kkiapay->verifyTransaction($request->transaction_id);
        if (!$transaction) {
            return redirect()->route('demands.index')->with('errors', 'Nous avons un probleme. Veuillez reessayer plus tard. 1');
        }

        if ($transaction->status == 'TRANSACTION_NOT_FOUND') {
            return redirect()->route('demands.index')->with('errors', 'Nous avons un probleme. Veuillez reessayer plus tard. 2');
        }

        if ($transaction->status != 'SUCCESS') {
            return redirect()->route('demands.index')->with('errors', 'Nous avons un probleme. Veuillez reessayer plus tard. 3');
        }
        $demand = Demand::where('payment_token', $transaction->state->uniqueId)->firstOrFail();
        $amount = $demand->document->prix;

        if ($transaction->amount < $amount) {
            return redirect()->route('demands.index')->with('errors', 'Erreur ! Le montant payé est inférieur au montant dû');
        }

        $demand->transaction_id = $request->transaction_id;
        $demand->save();
        return redirect()->route('demands.index');
    }
}
