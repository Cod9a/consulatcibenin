<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeCarteConsulaireController extends Controller
{
    public function show(Request $request, Demand $demand) {
        $data = [
            'transaction_id' => $demand->transaction_id,
            'payment_token' => $demand->payment_token,
        ];

        return response(base64_encode(QrCode::format('png')->size(150)->generate(json_encode($data))))->header('Content-Type', 'image/png');
    }
}
