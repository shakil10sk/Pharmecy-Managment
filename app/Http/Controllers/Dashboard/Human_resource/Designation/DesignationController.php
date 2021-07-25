<?php

namespace App\Http\Controllers\Dashboard\Human_resource\Designation;

use App\Http\Controllers\Controller;
use App\Models\Human_recource\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designation = Designation::all();
        return view('frontend.dashboard.pages.human_resource.designation.view',compact('designation'));
    }
    /**
     * Display a listing of the credit resource.
     *
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.dashboard.pages.human_resource.designation.create');
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
            'name' => 'required|unique:designations',
            'details' => 'required',
        ]);

        $data = new Designation();
        $data->name = $request->name ;
        $data->details = $request->details ;
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
        $designation = Designation::find($id);
        return view('frontend.dashboard.pages.human_resource.designation.edit',compact('designation'));
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
            'name' => 'required|unique:designations,name,'.$id,
            'details' => 'required'
        ]);

        $data = Designation::find($id);
        
        $data->name = $request->name ;
        $data->details = $request->details ;
      
        $data->save();
        session()->flash('success',"<b class='text-danger'>$request->name</b> has been Updated successfully !!! ");
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
        $data = Designation::find($id);
        $data->delete();
        session()->flash('success',"<b style='color:red'> $data->name </b> Manufacture has been Deleted Successfully  This ");
        return back();

    }
    
}
