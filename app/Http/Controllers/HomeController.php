<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\POS\Order;
use Carbon\Carbon;
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
        $today_sells = Order::whereDate('created_at', Carbon::today())->get();
       return view('frontend.index',compact('today_sells'));
        // return view('frontend.index');
    }
    // public function notify(){
    //     $stock=DB::table('medicines')->select('*')->where('qty','<',50)->get();

    //     return view('frontend.dashboard.partials.notification',compact('stock'));

    // }
}
