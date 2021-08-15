<?php

namespace App\Http\Controllers\Dashboard\Medicine;

use App\Http\Controllers\Controller;
use App\Models\Medicine\MedicineType;
use Illuminate\Http\Request;

class MedicineTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicineType = MedicineType::all();
        return view('frontend.dashboard.pages.medicine.type.view',compact('medicineType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.dashboard.pages.medicine.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'type' => 'required|unique:medicine_types',
            'status' => 'required'
        ]);
        $data = new MedicineType();
        $data->type = $request->type;
        $data->status = $request->status;
        $data->save();
        session()->flash('success',"<b class='text-danger'>$request->name</b> has been added successfully !!! ");
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
        $medicineType = MedicineType::find($id);
        return view('frontend.dashboard.pages.medicine.type.edit',compact('medicineType'));
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
            'type' => 'required|unique:medicine_types,type,'.$id,
            'status' => 'required'
        ]);
        $data = MedicineType::find($id);
        $data->type = $request->type ;
        $data->status = $request->status;
        $data->save();
        session()->flash('success',"<b class='text-danger'>$request->type</b> has been Updated successfully !!! ");
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
        $data = MedicineType::find($id);
        $data->delete();
        session()->flash('success',"<b style='color:red'> $data->type </b> Manufacture has been Deleted Successfully  This ");
        return back();
    }
}
