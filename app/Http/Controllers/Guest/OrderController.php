<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function formOrder($id)
    {
        $restaurant = User::find($id)->first();

        return view('guest.checkout', compact('restaurant'));


    }
}
