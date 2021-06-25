<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Medicine;
use Illuminate\Support\Facades\Redirect;
use Ramsey\Uuid\Exception\RandomSourceException;
use Image;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Medicine::orderby('id','desc')->paginate(10);
        return view('frontend.dashboard.pages.view_medicine',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.dashboard.pages.add_medicine');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    $request->validate([
    //         'Images' => 'require|images',
    //     ]);
        $value = new Medicine;

        if($request->hasFile('Images')){
            $image=$request->file('Images');
            // return $image ;
            $file_name=time().'.'.$image->getClientOriginalExtension();
            // return $file_name ;

            $image_resize=Image::make($image->getRealPath());
            $image_resize->resize(100,100);

            $image_resize->save('images/'.$file_name);
            $value->Images=$file_name;

        }
// return $value ;

        $value->medicine_name=$request->medicine_name;
        $value->genric_name=$request->genric_name;
        $value->category=$request->category;
        $value->manufecture=$request->manufecture;
        $value->self_number=$request->self_number;
        $value->strength=$request->strength;
        $value->medicine_price=$request->medicine_price;
        $value->menufecturer_price=$request->menufecturer_price;
        $value->save();
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
        //
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
        //
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
