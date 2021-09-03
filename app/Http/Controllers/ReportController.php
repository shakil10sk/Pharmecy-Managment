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



    public function Report(Request $request){




        // $company_id = GlobalHelper::getCompanyId();
        // $customar_id = $request->customar_id;
        $from_date = \request('from_date',0);
        $to_date = \request('to_date',0);





        $data=Order::join('customars','orders.customar_id','=','customars.id')
        ->select('orders.total_products','orders.total','orders.order_date','customars.customar_name', 'customars.email','customars.address','customars.phone')->get();
        // ->whereBetween(DB::raw('DATE(orders.order_date)'), array($from_date, $to_date))->get();


        // $order=OrderDetails::join('orders','order_details.order_id','=','orders.id')
        // ->select('order_details.')

        // $data = DB::table('orders AS ORD')
        //     ->select(DB::raw("CS.name,CS.phone,CS.email,CS.address,SUM(ORD.total_products) total_qty, SUM(ORD.total) payment_total"))
        //     ->Join('customars AS CS',function($join) use($from_date, $to_date) {
        //         $join->on('CS.id','=','ORD.customar_id')
        //             ->where('ORD.customar_id','=','CS.id');
        //     })
        //     ->where('ORD.customar_id','CS.id')
        //     ->when($from_date > 0 && $to_date > 0,function ($q) use ($from_date, $to_date){
        //         $q->whereBetween('ORD.order_date',[$from_date,$to_date]);
        //     })
        //     ->groupBy('ORD.customar_id')
        //     ->get();


            return view('frontend.dashboard.pages.report.reportForm',compact('data'));

        // return view('report.delivery.summary_print')->with([
        //     "company_info" => $request->customar_id,
        //     "data" => $data,
        //     "from_date" =>  $from_date,
        //     "to_date" =>  $to_date,
        // ]);

    }

}
