<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\Document;
use Illuminate\Http\Request;

class DemandsController extends Controller
{
    public function index() {
        $documents = Document::all();
        return view('demands.index', compact('documents'));
    }

    public function show() {
        return view('demands.show');
    }

    public function display(Request $request) {
        $request->validate([
            'reference' => ['required', 'exists:demands,payment_token'],
        ]);

        $demand = Demand::with(['encloseds', 'document', 'documentForm'])->where('payment_token', $request->get('reference'))->firstOrFail();
        return response()->json($demand);
    }
}
