<?php

namespace App\Http\Controllers;

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
}
