<?php

namespace App\Http\Controllers\Api;
use Braintree\Gateway as Gateway;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function apiPayment(Request $request)
    {
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'rw2zd9njvvf3w42d',
            'publicKey' => 'rn8j7jvp2fngxjf2',
            'privateKey' => 'a6cf4f01f5b243b47b4be3ea3a3a9274'
        ]);

        $result = $gateway->transaction()->sale([
            'amount' => 10,
            'paymentMethodNonce' => $request->input('paymentMethodNonce'),
            'options' => [
                'submitForSettlement' => True
                ]
            ]);
    
            return response()->json($result);

    }
}
