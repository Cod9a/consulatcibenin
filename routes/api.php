<?php

use App\Http\Controllers\CarteControllerDocumentFormController;
use App\Http\Controllers\DemandsController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\QrCodeCarteConsulaireController;
use App\Http\Controllers\QrCodeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/documents/{document}/demands', [CarteControllerDocumentFormController::class, 'store'])->name('carte-consulaire.store');
Route::get('/documents/{document}', [DocumentController::class, 'show'])->name('documents.show');
Route::get('/demands', [DemandsController::class, 'display'])->name('api.demands.show');
Route::get('/meetings', [MeetingController::class, 'index'])->name('meetings.index');
Route::post('/meetings', [MeetingController::class, 'store'])->name('meetings.store');
Route::get('/meetings/{meeting}/qr-code', [QrCodeController::class, 'show'])->name('meetings.qr-code.show');
Route::get('/demands/{demand}/qr-code', [QrCodeCarteConsulaireController::class, 'show'])->name('demands.qr-code.show');
