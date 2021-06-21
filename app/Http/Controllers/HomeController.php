<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Plate;

use App\User;
use Illuminate\Http\Request;

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
        $plates = Plate::where('user_id', Auth::id())->get();

        return view('admin.home', compact('plates'));
    }
}
