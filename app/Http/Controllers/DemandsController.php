<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemandsController extends Controller
{
    public function index() {
        return view('demands.index');
    }

    public function show() {
        return view('demands.show');
    }
}
