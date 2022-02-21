<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Support\Facades\File;

class DocumentDemandsController extends Controller
{
    public function create(Document $document) {
        if ($document->key === Document::CARTE_CONSULAIRE) {
            $countries = collect(json_decode(File::get(storage_path('pays.json'))));
            return view('demands.carte-consulaire-form', compact('document', 'countries'));
        }
        abort(404);
    }
}
