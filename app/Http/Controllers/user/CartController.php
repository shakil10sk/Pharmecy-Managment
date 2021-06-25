<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function CreateInvoice(Request $request)
    {
        // echo "Done";
        $data=Cart::Content();
        $cus_id=$request->customar_id;
        echo "<pre>";
        print_r($data);
        echo "<br>";
        print_r($cus_id);

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
