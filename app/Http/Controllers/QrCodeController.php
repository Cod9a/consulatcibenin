<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function show(Request $request, Meeting $meeting) {
        $data = [
            "meeting_id" => $meeting->id,
            "meeting_date" => $meeting->meeting_date,
            "meeting_deleted" => $meeting->deleted,
        ];
        return response(base64_encode(QrCode::format('png')->size(150)->generate(json_encode($data))))->header('Content-Type', 'image/png');
    }
}
