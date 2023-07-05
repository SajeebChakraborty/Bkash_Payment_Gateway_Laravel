<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BkashPaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {

    // Payment Routes for bKash
    Route::get('/bkash/payment', [BkashPaymentController::class, 'index']);
    Route::post('/bkash/get-token', [BkashPaymentController::class, 'getToken'])->name('bkash-get-token');
    Route::post('/bkash/create-payment', [BkashPaymentController::class, 'createPayment'])->name('bkash-create-payment');
    Route::post('/bkash/execute-payment', [BkashPaymentController::class, 'executePayment'])->name('bkash-execute-payment');
    Route::get('/bkash/query-payment', [BkashPaymentController::class, 'queryPayment'])->name('bkash-query-payment');
    Route::post('/bkash/success', [BkashPaymentController::class, 'bkashSuccess'])->name('bkash-success');

    // Refund Routes for bKash
    Route::get('/bkash/refund', [BkashPaymentController::class, 'refundPage'])->name('bkash-refund');
    Route::post('/bkash/refund', [BkashPaymentController::class, 'refund'])->name('bkash-refund');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
