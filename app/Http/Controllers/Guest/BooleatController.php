<?php

namespace App\Http\Controllers\Guest;

use App\Genre;
use App\Http\Controllers\Controller;
use App\Order;
use App\Plate;
use App\User;
use Illuminate\Http\Request;

class BooleatController extends Controller
{
    public function index()
    {
        $users = User::all();
        $plates = Plate::all();
        $genres = Genre::all();

        return view('guest.index', compact('users', 'genres', 'plates'));
    }

    public function show(User $user, Order $order )
    {
        return view('guest.show', ['user' => $user , 'order' => $order]);
    }

    public function chartjs()
    {
        $orders = Order::all();
        return view('prova_chartjs', compact('orders'));
    }
}
