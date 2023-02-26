<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/decode/bolt11/{bolt11}', function (Request $request) {
    $bolt11 = $request->bolt11;

    $decoder = new \Jorijn\Bitcoin\Bolt11\Encoder\PaymentRequestDecoder();
    $denormalizer = new \Jorijn\Bitcoin\Bolt11\Normalizer\PaymentRequestDenormalizer();

    $paymentRequest = $denormalizer->denormalize($decoder->decode($bolt11));

    $invoice = [
        'satsoshis' => $paymentRequest->getSatoshis(),
        'millisatoshis' => $paymentRequest->getMilliSatoshis(),
        'expiry_datetime' => $paymentRequest->getExpiryDateTime(),
        'expiry_timestamp' => $paymentRequest->getExpiryTimestamp(),
        'network' => $paymentRequest->getNetwork(),
        'payee_node_key' => $paymentRequest->getPayeeNodeKey(),
        'prefix' => $paymentRequest->getPrefix(),
        'recovery_flag' => $paymentRequest->getRecoveryFlag(),
        'signature' => $paymentRequest->getSignature(),
        'timestamp' => $paymentRequest->getTimestamp(),
        'timestamp_datetime' => $paymentRequest->getTimestampDateTime(),
    ];

    return response()->json($invoice);
});
