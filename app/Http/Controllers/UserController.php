<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\POS\Order;
use App\User;
use Image;
use File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index(){

        $today_sells = Order::whereDate('created_at', Carbon::today())->get();
        return view('frontend.index',compact('today_sells'));
    }
    public function profile(){

        $value=User::get();

        return view('dashboard.user.userProfile',compact('value'));

    }
    public function view(){
        $view_user=User::get();
        
        return view('frontend.dashboard.pages.employee.view',compact('view_user'));
    }

    public function edit($id){

        $edit=User::find($id);
        return view('frontend.dashboard.pages.employee.edit',compact('edit'));
    }
    public function update(Request $request,$id){

        $data=User::find($id);

        // return $data;
        // exit();
        // $new_data=$request->all();
        if($request->hasFile('photo')){
            $image=$request->file('photo');
            $file_name=time().'.'.$image->getClientOriginalExtension();
            $image_resize=Image::make($image->getRealPath());
            $image_resize->resize(300,400);

            $old_file=$data->photo;
            // dd($old_file);
           if(!empty($old_file)){
             $path=("public/images/users/".$old_file);
            unlink($path);
          }

            $image_resize->save("public/images/users/".$file_name);
            $data->photo=$file_name;
        }

        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=$request->password;
        $data->phone=$request->phone;
        $data->nid_number=$request->nid_number;
        $data->city=$request->city;
        $data->position=$request->position;
        $data->address=$request->address;
        $data->save();
        // dd($data);
        // $data->update($new_data);
        return redirect('/employee/view')->with('success','Update successfull');

    }
    public function delete($id){
        $delete=User::find($id);
        $old_file=$delete->photo;
        // dd($old_file);
       if(!empty($old_file)){
            $path=("public/images/users/$old_file");
            unlink($path);
        }
        $delete->delete();
        return Redirect('employee/view')->with('success','Deleted Successfull');
    }
}

