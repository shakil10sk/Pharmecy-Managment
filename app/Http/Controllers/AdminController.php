<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\POS\Order;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(){
       $today_sells = Order::whereDate('created_at', Carbon::today())->get();
       return view('frontend.index',compact('today_sells'));
    }
}
