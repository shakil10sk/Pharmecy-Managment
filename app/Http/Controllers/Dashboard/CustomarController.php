<?php

namespace App\Http\Controllers\Dashboard;

use App\Customar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Image;
use Illuminate\Support\Facades\Auth;
use App\POS\Order;

class CustomarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function Today_Sell(){

    //     $today_sells = Order::whereDate('created_at', Carbon::today())->get();
    //     return view('frontend.index',compact('today_sells'));
    // }
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
        if(Auth::user()->role==1 ||Auth::user()->role==2 ){
            return view('frontend.dashboard.pages.customar.add');
        }

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
            $img_resize->save('images/customar/'.$img_name);
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

        if($value->save()){
            return redirect()->back()->with('success','Customar Add Successfully');
        }else{
            return redirect()->back()->with('error','Wrong Information');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function posts(Request $request){
         return "Done";
     }
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
        $update=Customar::find($id);
        if($request->hasFile('photo')){
            $img=$request->file('photo');
            $img_name=time().'.'.$img->getClientOriginalExtension();
            $img_resize=Image::make($img->getRealPath());

            $img_resize->resize(400,300);
            $old_img=$update->photo;
            if(!empty($old_img)){
                $path=("images/customar/$old_img");
            }

            $img_resize->save('images/customar/'.$img_name);
            $update->photo=$img_name;
        }
        $update->customar_name=$request->customar_name;
        $update->email=$request->email;
        $update->phone=$request->phone;
        $update->custoamr_city=$request->custoamr_city;
        $update->address=$request->address;
        $update->ac_num=$request->ac_num;
        $update->bank_name=$request->bank_name;
        $update->bank_branch=$request->bank_branch;
        $update->update();
        return redirect('/customar/view')->with('success','Update successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Customar::find($id);
        $delete->delete();
        return redirect('/customar/view')->with('success','Delete successfull');
    }
}
