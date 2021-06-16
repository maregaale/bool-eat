<?php

namespace App\Http\Controllers\Api;

use App\Genre;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    //Tutti gli utenti con le categorie in formato json
    public function userWithGenres()
    {
        //Prendo gli utenti che hanno delle categorie associate
        $userGenres = User::with(['genres'])->get();
        //Risposta in Json
        return response()->json($userGenres);
    }
    //Tutte le categorie in formato json
    public function genres()
    {
        //Prendo tutte le categorie
        $genres = Genre::all();
        //Risposta in Json
        return response()->json($genres);
    }

  
    //Api che filtra i ristoranti per categoria
    public function filteredApi($genre)
    {
        if($genre != "All") {
            $restaurants = User::whereHas('genres', function($query) use($genre) {
                $query->where('name', $genre);
            })->get();
        } else {
            $restaurants = User::all();
        }
       

         foreach ($restaurants as $restaurant) {
             $genres = [];
             $genres = $restaurant->genres;
             $restaurant->genres = $genres;
            
         };

        return response()->json($restaurants);
    }


    

}
