<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\medicine;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturer = Manufacturer::all();
        return view('frontend.dashboard.pages.manufacturer.view',compact('manufacturer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.dashboard.pages.manufacturer.create');
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
            'manufacturer_name' => 'required|unique:manufacturers',
            'manufacturer_mobile' => 'required|unique:manufacturers'
        ]);
       Manufacturer::create([
            'manufacturer_name' => $request->manufacturer_name ,
            'manufacturer_mobile' => $request->manufacturer_mobile ,
            'manufacturer_email' => $request->manufacturer_email ,
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
        session()->flash('success','Manufacture Data Has Been Created Successfully ');
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
        $manufacturer = Manufacturer::find($id);
        return view('frontend.dashboard.pages.manufacturer.edit',compact('manufacturer'));
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
            'manufacturer_name' => 'required|unique:manufacturers,manufacturer_name,'.$id,
            'manufacturer_mobile' => 'required|unique:manufacturers,manufacturer_mobile,'.$id
        ]);
        $data = Manufacturer::find($id);
        $data->manufacturer_name = $request->manufacturer_name ;
        $data->manufacturer_mobile = $request->manufacturer_mobile ;
        $data->manufacturer_name = $request->manufacturer_name ;
        $data->manufacturer_mobile = $request->manufacturer_mobile ;
        $data->manufacturer_email = $request->manufacturer_email ;
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
        session()->flash('success',"$request->manufacturer_name has been successfully updated !!! ");
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
        $data = Manufacturer::find($id);
        $data->delete();
        session()->flash('success',"<b style='color:red'> $data->manufacturer_name </b> Manufacture has been Deleted Successfully  This ");
        return back();

    }
}
