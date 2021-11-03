<?php

namespace App\Http\Controllers;

use App\Models\Document;

class DocumentDemandsController extends Controller
{
    public function create(Document $document) {
        if ($document->key === Document::CARTE_CONSULAIRE) {
            return view('demands.carte-consulaire-form', compact('document'));
        }
        abort(404);
    }
}
