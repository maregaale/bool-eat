<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Order;
use App\Plate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orders($id)
    {
        // $plates = Plate::where('user_id', Auth::id())->get();

        // $orders = Order::all();



        
        // $earnings = DB::table("orders")->get()->sum("total");

        // $mediaTotal = DB::table('orders')->avg('total');
        // //dd($mediaTotal);

        // $january= DB::table('orders')
        //         ->whereMonth('created_at', '01')
        //         ->get();
        // $february= DB::table('orders')
        //            ->whereMonth('created_at', '02')
        //            ->get();
        // $march= DB::table('orders')
        //            ->whereMonth('created_at', '03')
        //            ->get();
        // $april= DB::table('orders')
        //            ->whereMonth('created_at', '04')
        //            ->get();
        // $may = DB::table('orders')
        //           ->whereMonth('created_at', '05')
        //           ->get();
        //           //dd($may);
        // $june = DB::table('orders')
        //           ->whereMonth('created_at', '06')
        //           ->get();
        //           //dd($june);
        // // dd($earnings);
        // return view('admin.orders.index', compact(
        //  'user',
        //  'plates',
        //  'earnings',
        //  'orders',
        //  'mediaTotal',
        //  'january',
        //  'february',
        //  'march',
        //  'april',
        //  'may',
        //  'june'
        // ));
        $user = Auth::user();
        return view('admin.orders.index', compact('user'));
    }
}
