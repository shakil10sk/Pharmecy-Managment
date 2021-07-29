<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data=array();
        $data['id']=$request->id;
        $data['name']=$request->name;
        $data['qty']=$request->qty;
        $data['price']=$request->price;
        $add=Cart::add($data);
        if($add){
            $notification= array(
                'message'=>'Product Added Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification= array(
                'message'=>'error',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function FinalInvoice(Request $request)
    {
        $data=array();
        $data['customar_id']=$request->customar_id;
        $data['order_date']=$request->order_date;
        $data['order_status']=$request->order_status;
        $data['total_products']=$request->total_products;
        $data['sub_total']=$request->sub_total;
        $data['vat']=$request->vat;
        $data['total']=$request->total;
        $data['payment_status']=$request->payment_status;
        $data['pay']=$request->pay;
        $data['due']=$request->due;

       $order_id=DB::table('orders')->insertGetId($data);
       $contents=Cart::content();
       $odata=array();
       foreach ($contents as $content) {
          $odata['order_id']= $order_id;
          $odata['product_id']= $content->id;
          $odata['quantity']= $content->qty;
          $odata['unitcost']= $content->price;
          $odata['total']= $content->total;

          $insert=DB::table('order_details')->insert($odata);
       }
       if($insert){

        Cart::destroy();
        return Redirect('/pos')->with('success','Successfully Invoice Created');
    }else{

        return Redirect()->back()->with('error','error exception');
    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function CreateInvoice(Request $request)
    {
        $validatedData = $request->validate([
            'cus_id' => 'required',],
            ['cus_id.required' => 'Select A Cutomar First!',
        ]);
        $cus_id=$request->cus_id;
        $customar=DB::table('customars')->where('id',$cus_id)->first();
        $contents=Cart::content();
        return view('frontend.dashboard.pages.user.invoice.view',compact('customar','contents'));



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function CartUpdate(Request $request, $rowId)
    {
        $qty=$request->qty;
        $update = Cart::update($rowId, $qty);
        if($update){
            $notification= array(
                'message'=>'Product Update Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification= array(
                'message'=>'error',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function CartRemove($rowId)
    {
        $remove=Cart::remove($rowId);
        if($remove){
            $notification= array(
                'message'=>'Product Remove Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification= array(
                'message'=>'error',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
