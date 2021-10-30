<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentDemandsController extends Controller
{
    public function create(Document $document) {
        if ($document->key === Document::CARTE_CONSULAIRE) {
            return view('demands.carte-consulaire-form');
        }
        abort(404);
    }
}
