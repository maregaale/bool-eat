<?php

namespace App\Http\Controllers\Guest;
use Braintree\Gateway as Gateway;
use Braintree\Transaction as Transaction;
use App\Http\Controllers\Controller;
use App\Mail\SendNewMail;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function formOrder($id)
    {
      $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'rw2zd9njvvf3w42d',
            'publicKey' => 'rn8j7jvp2fngxjf2',
            'privateKey' => 'a6cf4f01f5b243b47b4be3ea3a3a9274'
        ]);

        $token = $gateway->ClientToken()->generate();

        

        //dd($token);

        $restaurant = User::find($id)->first();

        return view('guest.checkout', compact('restaurant', 'token'));


    }

    public function storePayment(Request $request)
    {

        //dd($request->all());

        $data = $request->all();

        // $data['total'] = 20;
        $data['plates'] = [3 , 5];

        $newOrder = new Order();
        $newOrder->name = $data['name'];
        $newOrder->lastname = $data['lastname'];
        $newOrder->email = $data['email'];
        $newOrder->address = $data['address'];
        $newOrder->phone_number = $data['phone_number'];
        $newOrder->total = $data['total'];
        $newOrder->save();
        
        $newOrder->plates()->attach($data['plates']);

        Mail::to('info@booleat.com')->send(new SendNewMail($newOrder));

        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'rw2zd9njvvf3w42d',
            'publicKey' => 'rn8j7jvp2fngxjf2',
            'privateKey' => 'a6cf4f01f5b243b47b4be3ea3a3a9274'
        ]);

        $result = $gateway->transaction()->sale([
            'amount' => $data['total'],
            'paymentMethodNonce' => $request->payment_method_nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        

        return view('guest.success');
    }
}
