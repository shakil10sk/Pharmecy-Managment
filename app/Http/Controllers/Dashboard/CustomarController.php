<?php

namespace App\Http\Controllers\Dashboard;

use App\Customar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Image;

class CustomarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customar= Customar::orderby('id','desc')->paginate(5);
        return view('frontend.dashboard.pages.customar.view_customar',compact('customar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.dashboard.pages.customar.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $value=new Customar;
        $request->validate([
            'customar_name'=>'required|max:255',
            'email'=>'required|unique:customars|max:255',
            'phone'=>'required|unique:customars|max:255',
            'address'=>'required',
            'custoamr_city'=>'required',
            'ac_num'=>'required',
            'bank_name'=>'required',
            'bank_branch'=>'required',
            'photo'=>'required',
        ]);
        if($request->hasFile('photo')){
            $img=$request->file('photo');
            $img_name=time().'.'.$img->getClientOriginalExtension();
            $img_resize=Image::make($img->getRealPath());
            $img_resize->resize(100,100);
            $img_resize->save('images/'.$img_name);
            $value->photo=$img_name;
        }
        $value->customar_name=$request->customar_name;
        $value->email=$request->email;
        $value->phone=$request->phone;
        $value->custoamr_city=$request->custoamr_city;
        $value->address=$request->address;
        $value->ac_num=$request->ac_num;
        $value->bank_name=$request->bank_name;
        $value->bank_branch=$request->bank_branch;
        $value->save();
        // if($value->save()){
        //     $notification=array(
        //         'message'=>'Successfully Customar Inserted',
        //         'alert-type'=>'success'
        //     );
        //->with($notification)
        // }        
        return Redirect()->back();

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
        $customar=Customar::find($id);
        return view('frontend.dashboard.pages.customar.edit',compact('customar'));
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
        $oldData=Customar::find($id);
        $newData=$request->all();
        $oldData->update($newData);
        return Redirect('/customar/view')->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
