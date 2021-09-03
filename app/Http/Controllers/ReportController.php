<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\POS\Order;
use App\POS\OrderDetails;
use Carbon\Carbon;
class ReportController extends Controller
{
    public function index(){
        return view('frontend.dashboard.pages.report.reportForm');
    }

    public function stock(){
        $stock=DB::table('medicines')->select('*')->where('qty','<',50)->get();
        
        return view('frontend.dashboard.pages.report.stock',compact('stock'));
    }

    public function Report(Request $request){

        $from_date = \request('from_date',0);
        $to_date = \request('to_date',0);


        $data=Order::join('customars','orders.customar_id','=','customars.id')
        ->select('orders.total_products','orders.total','orders.order_date','customars.customar_name', 'customars.email','customars.address','customars.phone')->get();

        return view('frontend.dashboard.pages.report.reportForm',compact('data'));

    }

}
