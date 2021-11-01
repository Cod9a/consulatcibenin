<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarteConsulaireFormRequest;
use App\Models\DocumentForm;

class CarteControllerDocumentFormController extends Controller
{
    public function store(CarteConsulaireFormRequest $request) {
        DocumentForm::create($request->validated());
        return response()->json([], 201);
    }
}
