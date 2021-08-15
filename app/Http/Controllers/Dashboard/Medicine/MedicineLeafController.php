<?php

namespace App\Http\Controllers\Dashboard\Medicine;

use App\Http\Controllers\Controller;
use App\Models\Medicine\MedicineLeaf;
use Illuminate\Http\Request;

class MedicineLeafController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicineLeaf = MedicineLeaf::all();
        return view('frontend.dashboard.pages.medicine.leaf.view',compact('medicineLeaf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.dashboard.pages.medicine.leaf.create');
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
            'leaf_type' => 'required|unique:medicine_leaves',
            'total_number' => 'required'
        ]);
        $data = new MedicineLeaf();
        $data->leaf_type = $request->leaf_type;
        $data->total_number = $request->total_number;
        $data->save();
        session()->flash('success',"<b class='text-danger'>$request->leaf_type</b> has been added successfully !!! ");
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
        $medicineLeaf = MedicineLeaf::find($id);
        return view('frontend.dashboard.pages.medicine.leaf.edit',compact('medicineLeaf'));
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
            'leaf_type' => 'required|unique:medicine_leaves,leaf_type,'.$id,
            'total_number' => 'required'
        ]);
        $data = MedicineLeaf::find($id);
        $data->leaf_type = $request->leaf_type ;
        $data->total_number = $request->total_number;
        $data->save();
        session()->flash('success',"<b class='text-danger'>$request->leaf_type</b> has been Updated successfully !!! ");
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
        $data = MedicineLeaf::find($id);
        $data->delete();
        session()->flash('success',"<b style='color:red'> $data->leaf_type </b> Manufacture has been Deleted Successfully  This ");
        return back();
    }
}
