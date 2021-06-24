<?php

namespace App\Http\Controllers\Api;

use App\Genre;
use App\Http\Controllers\Controller;
use App\Order;
use App\Plate;
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


    public function searchRestaurant(Request $request)
    {
        //ricerca dei post per titolo
        $restaurant_names = User::where('restaurant_name' , 'like', '%' . $request->restaurant_name . '%' )->get();
        //Response in Json
        return response()->json($restaurant_names);
    }


    public function veganPlates()
    {
        //ricerca dei post per titolo
        $vegan_plates = Plate::where('vegan', 1)->get();
        //Response in Json
        return response()->json($vegan_plates);
    }




    public function orders($id)
    {
        $restaurant = User::where('id', $id)->firstOrFail();

        $allOrders = Order::all();

        $orders = [];
    
        foreach ($allOrders as $order) {
            
          foreach ($order->plates as $plate) {
    
            if ($plate->user_id === $restaurant->id && !in_array($order, $orders)) {
              
                $orders[] = $order;
    
            }
          }
        }
    
        return response()->json($orders);
    }


    

}
