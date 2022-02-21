<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke(Request $request, $demand = null) {
        $documents = Document::all();
        return view('welcome', compact('documents', 'demand'));
    }
}
