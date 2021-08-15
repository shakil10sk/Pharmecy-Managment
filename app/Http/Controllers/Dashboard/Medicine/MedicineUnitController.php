<?php

namespace App\Http\Controllers\Dashboard\Medicine;

use App\Http\Controllers\Controller;
use App\Models\Medicine\MedicineUnit;
use Illuminate\Http\Request;

class MedicineUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicineUnit = MedicineUnit::all();
        return view('frontend.dashboard.pages.medicine.unit.view',compact('medicineUnit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.dashboard.pages.medicine.unit.create');
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
            'unit' => 'required|unique:medicine_units',
            'status' => 'required'
        ]);
        $data = new MedicineUnit();
        $data->unit = $request->unit;
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
        $medicineUnit = MedicineUnit::find($id);
        return view('frontend.dashboard.pages.medicine.unit.edit',compact('medicineUnit'));
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
            'unit' => 'required|unique:medicine_units,unit,'.$id,
            'status' => 'required'
        ]);
        $data = MedicineUnit::find($id);
        $data->unit = $request->unit ;
        $data->status = $request->status;
        $data->save();
        session()->flash('success',"<b class='text-danger'>$request->unit</b> has been Updated successfully !!! ");
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
        $data = MedicineUnit::find($id);
        $data->delete();
        session()->flash('success',"<b style='color:red'> $data->unit </b> Manufacture has been Deleted Successfully  This ");
        return back();
    }
}
