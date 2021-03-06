<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Medicine;
use Illuminate\Support\Facades\Redirect;
use Ramsey\Uuid\Exception\RandomSourceException;
use Image;
use App\Exports\MedicinesExport;
use App\Imports\MedicinesImport;
use Facade\FlareClient\Stacktrace\File as StacktraceFile;
use Maatwebsite\Excel\Facades\Excel;
use file;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Medicine::join('categories','medicines.category_id','=','categories.id')
        ->select('medicines.*','categories.category')->get();

        // $data= Medicine::orderby('id','desc')->paginate(10);
        return view('frontend.dashboard.pages.medicine.view_medicine',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('frontend.dashboard.pages.medicine.add_medicine',compact('category'));
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

            $image_resize->resize(300,400);

            $image_resize->save('public/images/'.$file_name);

            $value->Images=$file_name;
        }
// return $value ;
        $value->medicine_name=$request->medicine_name;
        $value->genric_name=$request->genric_name;
        $value->category_id=$request->category_id;
        $value->manufecture=$request->manufecture;
        $value->self_number=$request->self_number;
        $value->qty=$request->qty;
        $value->strength=$request->strength;
        $value->sell_price=$request->sell_price;
        $value->manufecture_price=$request->manufecture_price;
        $value->Product_code=$request->Product_code;
        $value->buy_date=$request->buy_date;
        $value->manufecturer_date=$request->manufecturer_date;
        $value->expire_date=$request->expire_date;

        if(  $value->save()){

            return redirect()->back()->with('success','Successfully Medicine Added');

        }else{

            return redirect()->back()->with('error','Somtheing is Wrong .Please give information again');

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
        $show_data=Medicine::join('categories','medicines.category_id','=','categories.id')
        ->select('medicines.*','categories.category')->find($id);

        // dd($show_data);
         return view('frontend.dashboard.pages.medicine.show',compact('show_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_id=Medicine::where('id',$id)->first();

        $category=Category::all();

        return view('frontend.dashboard.pages.medicine.edit_medicine',compact('edit_id','category'));
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

        $data=Medicine::find($id);
        // return $data;
        // exit();
        // $new_data=$request->all();
        if($request->hasFile('Images')){
            $image=$request->file('Images');
            $file_name=time().'.'.$image->getClientOriginalExtension();
            $image_resize=Image::make($image->getRealPath());
            $image_resize->resize(300,400);

            $old_file=$data->Images;
            // dd($old_file);
           if(!empty($old_file)){
             $path=("public/images/".$old_file);
            unlink($path);
          }

            $image_resize->save('public/images/'.$file_name);
            $data->Images=$file_name;


        }

        $data->medicine_name=$request->medicine_name;
        $data->genric_name=$request->genric_name;
        $data->category_id=$request->category_id;
        $data->manufecture=$request->manufecture;
        $data->self_number=$request->self_number;
        $data->qty=$request->qty;
        $data->strength=$request->strength;
        $data->sell_price=$request->sell_price;
        $data->manufecture_price=$request->manufecture_price;
        $data->Product_code=$request->Product_code;
        $data->buy_date=$request->buy_date;
        $data->manufecturer_date=$request->manufecturer_date;
        $data->expire_date=$request->expire_date;
        $data->save();
        // $data->update($new_data);
        return redirect('/medicine/view')->with('success','Update successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Medicine::find($id);
        $old_file=$delete->Images;
           if(!empty($old_file)){
             $path=("public/images/$old_file");
             unlink($path);
          }
        $delete->delete();
         return back()->with('success','Data Deleted successfully');

    }


    public function importMedicine(){
        return view('frontend.dashboard.pages.medicine.importMedicine');
    }


    public function export()
    {
        return Excel::download(new MedicinesExport, 'Medicines.xlsx');
    }


    public function import(Request $request)
    {

        $import= Excel::import(new MedicinesImport, $request->file('import_file'));

        if( $import){

                $notification=array(
                    'message'=>'Medicine Import Successfully',
                    'alert-type'=>'success'
                );
                return Redirect(url('/medicine/view'))->with($notification);

            }else{

                return Redirect()->back();

            }
    }
}
