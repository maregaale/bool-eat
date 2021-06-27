<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Support\Facades\Auth;
use App\Plate;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        $media = DB::table("plates")->avg('price');
        $vegan_plates = Plate::where('vegan', 1)->get();
        $vegetarian_plates = Plate::where('vegetarian', 1)->get();
        $spicy_plates = Plate::where('hot', 1)->get();
        $glutenfree_plates = Plate::where('gluten_free', 1)->get();

        $plates = Plate::where('user_id', Auth::id())->get();
        //dd($user->address);

        return view('admin.home', compact('plates', 'user', 'vegan_plates', 'spicy_plates', 'glutenfree_plates', 'media', 'vegetarian_plates'));
    }
}
