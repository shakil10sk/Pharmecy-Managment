<?php

namespace App\Http\Controllers\Dashboard\Human_resource\Employee;

use App\Http\Controllers\Controller;
use App\Models\Human_recource\Designation;
use App\Models\Human_recource\Employee;
use Illuminate\Http\Request;
use Image ;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        return view('frontend.dashboard.pages.human_resource.employee.view',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $designation = Designation::all();
        return view('frontend.dashboard.pages.human_resource.employee.create',compact('designation'));
    
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
            'first_name' => 'required|unique:employees',
            'last_name' => 'required',
            'designation_id' => 'required',
            'phone' => 'required',
            'salary_type' => 'required',
            'salary_value' => 'required',
            'email' => 'required',
            'blood' => 'required',
            'address' => 'required',
            'address2' => 'required',
            'country' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'status' => 'required',
        ]);
        $data = new Employee();
        $data->first_name = $request->first_name ;
        $data->last_name = $request->last_name ;
        $data->designation_id = $request->designation_id ;
        $data->phone = $request->phone ;
        $data->salary_type = $request->salary_type ;
        $data->salary_value = $request->salary_value ;
        $data->email = $request->email ;
        $data->blood = $request->blood ;
        $data->address = $request->address ;
        $data->address2 = $request->address2 ;
        $data->country = $request->country ;
        $data->city = $request->city ;
        $data->zip = $request->zip ;
        $data->status = $request->status ;
        if($request->hasFile('image')){
            $image=$request->file('image');
            // return $image ;
            $original_name = $image->getClientOriginalName() ;
            $file_name=time().'.'.$image->getClientOriginalExtension();
            // return $file_name ;

            $image_resize=Image::make($image->getRealPath());
            $image_resize->resize(300,300);

            $image_resize->save('images/employee/'.$file_name);
            $data->image = $file_name;
            

        }
        $data->save();
        session()->flash('success',"<b class='text-danger'>$request->first_name</b> has been added successfully !!! ");
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
        $employee = Employee::find($id);
        $designation = Designation::all();
        return view('frontend.dashboard.pages.human_resource.employee.edit',compact('designation','employee'));
    
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
            'first_name' => 'required|unique:employees,first_name,'.$id,
            'last_name' => 'required',
            'designation_id' => 'required',
            'phone' => 'required',
            'salary_type' => 'required',
            'salary_value' => 'required',
            'email' => 'required',
            'blood' => 'required',
            'address' => 'required',
            'address2' => 'required',
            'country' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'status' => 'required',
        ]);
        $data = Employee::find($id);
        $data->first_name = $request->first_name ;
        $data->last_name = $request->last_name ;
        $data->designation_id = $request->designation_id ;
        $data->phone = $request->phone ;
        $data->salary_type = $request->salary_type ;
        $data->salary_value = $request->salary_value ;
        $data->email = $request->email ;
        $data->blood = $request->blood ;
        $data->address = $request->address ;
        $data->address2 = $request->address2 ;
        $data->country = $request->country ;
        $data->city = $request->city ;
        $data->zip = $request->zip ;
        $data->status = $request->status ;
        
        if($request->hasfile('image')){
            $image = $request->file('image');
            $file_name = time().'.'.$image->getClientOriginalExtension();
            $old_image = $data->image;
            if($old_image != ""){
                $randPic = $data->image ;
                $firstLatter = substr($randPic,0,4);
                if($firstLatter != "http"){
                    $path = "images/employee/$old_image";
                    unlink($path);
                }
                
            }
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(300,300);
            $image_resize->save('images/employee/'.$file_name);
            // $request->image->move('images/',$file_name);
            $data->image = $file_name; 
        }
        $data->save();
        session()->flash('success',"<b class='text-danger'>$request->first_name</b> has been Updated successfully !!! ");
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
        $data = Employee::find($id);
        $data->delete();
        session()->flash('success',"<b style='color:red'> $data->first_name </b> Manufacture has been Deleted Successfully  This ");
        return back();
    }
}
