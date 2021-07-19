<?php

namespace App\Http\Controllers\Dashboard\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();
        return view('frontend.dashboard.pages.customer.view',compact('customer'));
    }
    /**
     * Display a listing of the credit resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function credit()
    {
        $customer = Customer::where('previous_balance','<=', 0)->get();
        // dd($customer);

        return view('frontend.dashboard.pages.customer.credit',compact('customer'));
    }
    /**
     * Display a listing of the paid resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paid()
    {
        $customer = Customer::where('previous_balance','>', 0)->get();
        // dd($customer);
        return view('frontend.dashboard.pages.customer.paid',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.dashboard.pages.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|unique:customers',
            'customer_mobile' => 'required|unique:customers'
        ]);
       Customer::create([
            'customer_name' => $request->customer_name ,
            'customer_mobile' => $request->customer_mobile ,
            'customer_email' => $request->customer_email ,
            'email_address' => $request->email_address ,
            'phone' => $request->phone ,
            'contact' => $request->contact ,
            'address' => $request->address ,
            'address2' => $request->address2 ,
            'fax' => $request->fax ,
            'city' => $request->city ,
            'state' => $request->state ,
            'zip' => $request->zip ,
            'country' => $request->country ,
            'previous_balance' => $request->previous_balance ,
        ]);
        session()->flash('success','Customer Data Has Been Created Successfully ');
        return back();
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
        $customer = Customer::find($id);
        return view('frontend.dashboard.pages.customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|unique:customers,customer_name,'.$id,
            'customer_mobile' => 'required|unique:customers,customer_mobile,'.$id
        ]);
        $data = Customer::find($id);
        $data->customer_name = $request->customer_name ;
        $data->customer_mobile = $request->customer_mobile ;
        $data->customer_name = $request->customer_name ;
        $data->customer_mobile = $request->customer_mobile ;
        $data->customer_email = $request->customer_email ;
        $data->email_address = $request->email_address ;
        $data->phone = $request->phone ;
        $data->contact = $request->contact ;
        $data->address = $request->address ;
        $data->address2 = $request->address ;
        $data->fax = $request->fax ;
        $data->city = $request->city ;
        $data->state = $request->state ;
        $data->zip = $request->zip ;
        $data->country = $request->country ;
        $data->previous_balance = $request->previous_balance ;
        $data->save();
        session()->flash('success',"$request->customer_name has been successfully updated !!! ");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Customer::find($id);
        $data->delete();
        session()->flash('success',"<b style='color:red'> $data->customer_name </b> Manufacture has been Deleted Successfully  This ");
        return back();

    }
    
}
