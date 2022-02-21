<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarteConsulaireFormRequest;
use App\Mail\DemandCreated;
use App\Models\Demand;
use App\Models\Details;
use App\Models\Meeting;
use App\Models\Document;
use App\Models\DocumentForm;
use App\Models\Enclosed;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Kkiapay\Kkiapay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Exception;

class CarteControllerDocumentFormController extends Controller
{
    public function store(CarteConsulaireFormRequest $request, Document $document) {
        $demand = Demand::create([
            'document_id' => $document->id,
            'status' => 'invalid',
            'payment_token' => Str::random(6),
        ]);

        if ($request->hasFile('photo')) {
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->store('public/enclosed');
            Enclosed::create([
                'name' => $name,
                'path' => $path,
                'label' => 'Photo d\'identité',
                'demand_id' => $demand->id,
            ]);
        }

        if ($request->hasFile('certificate')) {
            $name = $request->file('certificate')->getClientOriginalName();
            $path = $request->file('certificate')->store('public/enclosed');
            Enclosed::create([
                'name' => $name,
                'path' => $path,
                'label' => 'Certificat de naissance',
                'demand_id' => $demand->id,
            ]);
        }

        if ($request->hasFile('ID')) {
            $name = $request->file('ID')->getClientOriginalName();
            $path = $request->file('ID')->store('public/enclosed');
            Enclosed::create([
                'name' => $name,
                'path' => $path,
                'label' => 'Pièce d\'identité',
                'demand_id' => $demand->id,
            ]);
        }

        $details = Details::create([
            'demand_id' => $demand->id
        ]);

        if($request->rdv) {
            $meeting = Meeting::create([
                'demand_id' => $demand->id,
                'meeting_date' => $request->enrollment_date,
                'meeting_time' => $request->enrollment_time,
            ]);

            $details->update([
                'rdv' => true
            ]);
        }

        if($request->ship) {
            $details->update([
                'ship' => true
            ]);
        }
        
        $documentForm = DocumentForm::create(Arr::add($request->except('photo', 'certificate', 'ID', 'enrollment_date', 'enrollment_time', 'rdv', 'mail', 'sms', 'ship'), 'demand_id', $demand->id));
        return response()->json(['payment_token' => $demand->payment_token, 'nom' => $documentForm->last_name, 'prenom' => $documentForm->first_name, 'demandId' => $demand->id], 201);
    }

    public function payment(Request $request)
    {
        try {
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

            $demand->status = 'payé';
            $demand->transaction_id = $request->transaction_id;
            $name = "CC-" . uniqid() . ".pdf";
            $demand->attestation = $name;
            $demand->save();

            $qrData = [
                'transaction_id' => $demand->transaction_id,
                'payment_token' => $demand->payment_token,
            ];

            $data = [
                'demand' => $demand,
                'detail' => $demand->detail
            ];

            if($demand->documentForm->email) {
                Mail::to($demand->documentForm->email)->send(new DemandCreated($demand));
            }

            $pdf = PDF::loadView('attestations/attestation2', $data);
            Storage::disk('attestations')->put($name, $pdf->output());

            $accountid = 'WEBCOOM';
            $password = 'M3Dxzny68CQ2';
            $urlapi = 'https://lampush-tls.lafricamobile.com/api';
            $to = explode(" ", $demand->documentForm->phone);
            $to = $to[0] . $to[1];
            $sender = 'CONSULAT';
            $text = 'Bonjour, votre demande de carte consulaire est acceptée. Votre code de suivi est ' . $demand->payment_token . '. Cliquez sur le lien suivant pour accéder au site du CONSULAT ' . route('welcome') . '.';
            $text = urlencode($text);
            $full_url_called = $urlapi.'?'."accountid=$accountid&password=$password"."&text=$text"."&to=$to"."&sender=$sender";
            $result = file_get_contents($full_url_called);
            print_r($result);
  
            return redirect()->route('attestation')->with(['success' => "Votre demande a été créée avec succès. <br> Retenez le code de suivi ci-dessous pour suivre son avancement.", 'attestation' => $demand->attestation, 'id' => $demand->id, 'nom' => $demand->documentForm->last_name, 'prenom' => $demand->documentForm->first_name, 'status' => $demand->status, 'code' => $demand->payment_token, 'created_at' => $demand->created_at, 'rdv' => $demand->detail->rdv, 'ship' => $demand->detail->ship]);
        } catch(Exception $e) {
            dd("Error: ". $e->getMessage());
        }
    }

    public function attestation() {
        // return view('attestations/attestation');
        return Session::has('success') ? view('attestations/attestation') : redirect()->route('welcome');
    }

    public function qrCode() {
        return response(base64_encode(QrCode::format('png')->size(150)->generate(json_encode(1))))->header('Content-Type', 'image/png');
    }
}
