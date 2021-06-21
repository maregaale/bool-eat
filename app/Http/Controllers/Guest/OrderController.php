<?php

namespace App\Http\Controllers\Guest;
use Braintree\Gateway as Gateway;
use Braintree\Transaction as Transaction;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function formOrder($id)
    {
        $restaurant = User::find($id)->first();

        $gateway = new Gateway([ 
            'environment' => 'sandbox',
            'merchantId' => '6fgmgkg9h9rz85kp',
            'publicKey' => 'xfg5vxxfb7ycbdtk',
            'privateKey' => '9a6b94af4897873269d5453a18f6b5c3'
          ]);

          // pass $clientToken to your front-end
        $clientToken = $gateway->clientToken()->generate([]);

        // $nonceFromTheClient = $_POST["payment_method_nonce"];
        /* Use payment method nonce here */

        // $result = $gateway->transaction()->sale([
        //     'amount' => '10.00',
        //     'paymentMethodNonce' => $nonceFromTheClient,
        //     'deviceData' => $deviceDataFromTheClient,
        //     'options' => [
        //       'submitForSettlement' => True
        //     ]
        //   ]);

        // Result di prova
        $result = $gateway->transaction()->sale([
            'amount' => '10.00',
            'paymentMethodNonce' => 'fake-valid-nonce',
            'options' => [
              'submitForSettlement' => True
            ]
          ]);
          if ($result->success) {
            print_r("success!: " . $result->transaction->id);
        } else if ($result->transaction) {
            print_r("Error processing transaction:");
            print_r("\n  code: " . $result->transaction->processorResponseCode);
            print_r("\n  text: " . $result->transaction->processorResponseText);
        } else {
            foreach($result->errors->deepAll() AS $error) {
              print_r($error->code . ": " . $error->message . "\n");
            }
        }

        return view('guest.checkout', compact('restaurant'));

    }
}
