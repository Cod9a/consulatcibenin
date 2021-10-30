<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke() {
        $documents = Document::all();
        return view('welcome', compact('documents'));
    }
}
