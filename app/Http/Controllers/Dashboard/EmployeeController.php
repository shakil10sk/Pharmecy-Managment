<?php

namespace App\Http\Controllers\Dashboard;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Image;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $employee= Employee::orderBy('id','desc')->paginate(5);
        $employee= Employee::all();
        return view('frontend.dashboard.pages.employee.view',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.dashboard.pages.employee.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $value=new Employee;
        if($request->hasFile('photo')){
            $photo=$request->file('photo');
            $file_name=time().'.'.$photo->getClientOriginalExtension();
            $photo_resize=Image::make($photo->getRealPath());
            $photo_resize->resize(150,150);
            $photo_resize->save('images/employee/'.$file_name);
            $value->photo=$file_name;

        }
        $value->firstname=$request->firstname;
        $value->lastname=$request->lastname;
        $value->username=$request->username;
        $value->email=$request->email;
        $value->phone=$request->phone;
        $value->address=$request->address;
        $value->experience=$request->experience;
        $value->salary=$request->salary;
        $value->nid_number=$request->nid_number;
        $value->vacation=$request->vacation;
        $value->city=$request->city;
        $value->position=$request->position;
        $value->password=$request->password;
        $value->confirm_password=$request->confirm_password;
        if(  $value->save()){
            return redirect()->back()->with('success','Employee Add Successfully');
        }else{
            return redirect()->back()->with('error','Please give Valid Information');
        }


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
        $employee=Employee::find($id);
        return view('frontend.dashboard.pages.employee.edit',compact('employee'));
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
        $oldData=Employee::find($id);
        $newData=$request->all();
        $oldData->update($newData);
        $notification=array(
            'message'=>'Successfully data delete',
            'alert-type'=>'success'
            );
            return Redirect('/employee/view')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee=Employee::find($id);
        $employee->delete();
        $info=array(
            'message'=>'Successfully data deleted',
            'alert-type'=>'success'
            );
            return back()->with($info);
    }
}
