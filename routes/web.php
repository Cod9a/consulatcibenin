<?php

use App\Http\Controllers\CarteControllerDocumentFormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandsController;
use App\Http\Controllers\DocumentDemandsController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class, '__invoke'])->name('welcome');
Route::get('/demands', [DemandsController::class, 'index'])->name('demands.index');
Route::get('/demand-status', [DemandsController::class, 'show'])->name('demands.show');
Route::get('/documents/{document}/demands/create', [DocumentDemandsController::class, 'create'])->name('documents.demands.create');
Route::get('/meetings/create', [MeetingController::class, 'create'])->name('meetings.create');
Route::get('/payment', [CarteControllerDocumentFormController::class, 'payment'])->name('payment.callback');
Route::get('/meeting/payment', [MeetingController::class, 'payment'])->name('payment.callback');
