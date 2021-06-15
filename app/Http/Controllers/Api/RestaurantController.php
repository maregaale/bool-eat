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

    public function filterGenre(Request $request)
    {   
        //Tutti i ristoranti
        $restaurants = User::all();
        //metodo collect php
        $restaurantsFinded = collect();
        // aggiungo i genres per ogni ristorante
        foreach ($restaurants as $restaurant) {
            
            if ($restaurant->genres->contains('id', $request->genre)) {   
                $restaurantsFinded->add($restaurant);
            }
            
        }
        //Risposta in json
        return response()->json($restaurantsFinded);
    }


    

}
