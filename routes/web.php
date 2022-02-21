<?php

use App\Http\Controllers\CarteControllerDocumentFormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandsController;
use App\Http\Controllers\DocumentDemandsController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CountryController;
use App\Models\Demand;

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
Route::get('/meeting/payment', [MeetingController::class, 'payment'])->name('meeting.payment.callback');
Route::view('test', 'test');

Route::get('/download/{name}', function($name) {
	if(Storage::disk('attestations')->exists($name)) {
		$path = Storage::disk('attestations')->path($name);
		$content = file_get_contents($path);
		$headers = array(
          'Content-Type: application/pdf',
        );

    	return response()->download($path, 'attestation.pdf', $headers);
	}
	abort(404);
})->name('download');

Route::get('sms', function() {
	$accountid = 'WEBCOOM';
	$password = 'M3Dxzny68CQ2';
	$urlapi = 'https://lampush-tls.lafricamobile.com/api';

	$to = explode(" ", "+229 62691850");
	$to = $to[0] . $to[1];	
	$sender = 'CONSULAT-BENIN-CI';
	$text = 'Bonjour, votre demande de carte consulaire est acceptée. Votre code de suivi est ' . $accountid . '.';

	$text = urlencode($text);
	$full_url_called = $urlapi.'?'."accountid=$accountid&password=$password"."&text=$text"."&to=$to"."&sender=$sender";
	// print "$full_url_called\n";
	$result = file_get_contents($full_url_called);
	print_r($result);
});

Route::get('/countries', [CountryController::class, 'index'])->name('countries');

Route::get('/demande-cree', [CarteControllerDocumentFormController::class, 'attestation'])->name('attestation');

Route::get('/qrCode', [CarteControllerDocumentFormController::class, 'qrCode'])->name('qrCode');