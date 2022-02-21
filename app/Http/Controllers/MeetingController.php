<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use Illuminate\Http\Request;
use App\Models\Meeting;
use Illuminate\Validation\ValidationException;
use Kkiapay\Kkiapay;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MeetingController extends Controller
{
    public function create() {
        return view('meetings.create');
    }

    public function index()
    {
        $meetings = Meeting::query();
        if (request()->has('date')) {
            $meetings = $meetings->whereDate('meeting_date', '=', request()->get('date'));
        }
        $meetings = $meetings->orderBy('meeting_date', 'desc')->paginate();
        return response()->json($meetings);
    }
    
    public function store(Request $request) {
        $request->validate([
            'payment_token' => ['required', 'exists:demands,payment_token'],
            'meeting_date' => ['required', 'date', 'after:now'],
        ]);
        $demand = Demand::firstWhere('payment_token', $request->payment_token);
        if ($demand->rejection) {
            throw ValidationException::withMessages([
                'payment_token' => 'Le code de suivi entré n\'est pas valide.',
            ]);
        }
        if ($demand->meeting) {
            throw ValidationException::withMessages([
                'payment_token' => 'Vous ne pouvez pas etablir plusieurs rendez-vous pour une même demande',
            ]);
        }
        if ($demand->status !== 'disponible')  {
            throw ValidationException::withMessages([
                'payment_token' => 'Votre document n\'est pas encore prêt',
            ]);
        }
        $meeting = Meeting::create([
            'demand_id' => $demand->id,
            'meeting_date' => $request->meeting_date,
        ]);
        return response()->json($meeting, 201);
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
        $meeting = Meeting::findOrFail($transaction->state->uniqueId);
        $amount = 2000;

        if ($transaction->amount < $amount) {
            return redirect()->route('/')->with('errors', 'Erreur ! Le montant payé est inférieur au montant dû');
        }

        $meeting->save();
        $data = [
            "meeting_id" => $meeting->id,
            "meeting_date" => $meeting->meeting_date,
            "meeting_deleted" => $meeting->deleted,
        ];
        $qrCode = base64_encode(QrCode::format('png')->size(150)->generate(json_encode($data)));
        return redirect('/')->with('success', 
            "
                <div class='flex flex-col items-center'>
                    <div class='bg-gray-50 rounded-full'>
                        <img src='data:image/png;base64, ${qrCode}' alt='' class='my-4 mx-auto'>
                    </div>
                    <p>
                    Nous vous conseillons de prendre en photo le Qr Code ci-dessus. Il s'agit d'une attestation de votre rendez-vous.
                    </p>
                </div>
            "
        );
    }
}
