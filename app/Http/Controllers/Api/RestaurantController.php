<?php

namespace App\Http\Controllers\Api;

use App\Genre;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function userWithGenres()
    {
        //Prendo gli utenti che hanno delle categorie associate
        $userGenres = User::with(['genres'])->get();
        //Risposta in Json
        return response()->json($userGenres);
    }

    public function genres()
    {
        //Prendo tutte le categorie
        $genres = Genre::all();
        //Risposta in Json
        return response()->json($genres);
    }


    

}
