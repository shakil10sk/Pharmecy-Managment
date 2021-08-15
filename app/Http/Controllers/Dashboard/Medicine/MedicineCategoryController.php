<?php

namespace App\Http\Controllers\Dashboard\Medicine;

use App\Http\Controllers\Controller;
use App\Models\Medicine\MedicineCategory;
use Illuminate\Http\Request;

class MedicineCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicineCategory = MedicineCategory::all();
        return view('frontend.dashboard.pages.medicine.category.view',compact('medicineCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.dashboard.pages.medicine.category.create');
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
            'name' => 'required|unique:medicine_categories',
            'status' => 'required'
        ]);
        $data = new MedicineCategory();
        $data->name = $request->name ;
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
        $medicineCategory = MedicineCategory::find($id);
        return view('frontend.dashboard.pages.medicine.category.edit',compact('medicineCategory'));
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
            'name' => 'required|unique:medicine_categories,name,'.$id,
            'status' => 'required'
        ]);
        $data = MedicineCategory::find($id);
        $data->name = $request->name ;
        $data->status = $request->status;
        $data->save();
        session()->flash('success',"<b class='text-danger'>$request->name</b> has been added successfully !!! ");
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
        $data = MedicineCategory::find($id);
        $data->delete();
        session()->flash('success',"<b style='color:red'> $data->name </b> Manufacture has been Deleted Successfully  This ");
        return back();
    }
}
