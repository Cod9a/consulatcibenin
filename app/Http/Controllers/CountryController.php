<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CountryController extends Controller
{
    public function index() {
        $countries = collect(json_decode(File::get(storage_path('pays.json'))));
        return $countries;
    }
}
