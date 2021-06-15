<?php

namespace App\Http\Controllers\Guest;

use App\Genre;
use App\Http\Controllers\Controller;
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
}
