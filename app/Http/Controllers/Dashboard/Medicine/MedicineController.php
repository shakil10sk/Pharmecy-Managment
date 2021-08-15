<?php

namespace App\Http\Controllers\Dashboard\Medicine;

use App\Http\Controllers\Controller;
use App\Models\Manufacturer;
use App\Models\Medicine\Medicine;
use App\Models\Medicine\MedicineCategory;
use App\Models\Medicine\MedicineLeaf;
use App\Models\Medicine\MedicineType;
use App\Models\Medicine\MedicineUnit;
use Illuminate\Http\Request;
// use Intervention\Image\ImageManager as Image ;
use Image ;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicine = Medicine::all();
        return view('frontend.dashboard.pages.medicine.medicine.view',compact('medicine'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicineCategory = MedicineCategory::all();
        $medicineUnit = MedicineUnit::all();
        $medicineLeaf = MedicineLeaf::all();
        $medicineType = MedicineType::all();
        $manufacturer = Manufacturer::all();
        return view('frontend.dashboard.pages.medicine.medicine.create',compact('medicineCategory','medicineUnit','medicineLeaf','medicineType','manufacturer'));
    
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
            'medicine_name' => 'required|unique:medicines',
            'barcode_id' => 'required',
            'strength' => 'required',
            'strength' => 'required',
            'generic_name' => 'required',
            'box_size' => 'required',
            'unit_id' => 'required',
            'category_id' => 'required',
            'type_id' => 'required',
            'manufacturer_id' => 'required',
            'product_location' => 'required',
            'product_details' => 'required',
            'price' => 'required',
            'manufacturer_price' => 'required',
            'tax0' => 'required',
            'tax1' => 'required',
            'status' => 'required'
        ]);
        $data = new Medicine();
        $data->medicine_name = $request->medicine_name ;
        $data->barcode_id = $request->barcode_id ;
        $data->strength = $request->strength ;
        $data->generic_name = $request->generic_name ;
        $data->box_size = $request->box_size ;
        $data->unit_id = $request->unit_id ;
        $data->category_id = $request->category_id ;
        $data->type_id = $request->type_id ;
        $data->manufacturer_id = $request->manufacturer_id ;
        $data->product_location = $request->product_location ;
        $data->product_details = $request->product_details ;
        $data->price = $request->price ;
        $data->manufacturer_price = $request->manufacturer_price ;
        $data->tax0 = $request->tax0 ;
        $data->tax1 = $request->tax1 ;
        $data->status = $request->status;
        if($request->hasFile('image')){
            $image=$request->file('image');
            // return $image ;
            $original_name = $image->getClientOriginalName() ;
            $file_name=time().'.'.$image->getClientOriginalExtension();
            // return $file_name ;

            $image_resize=Image::make($image->getRealPath());
            $image_resize->resize(100,100);

            $image_resize->save('images/medicine/'.$file_name);
            $data->image = $file_name;
            

        }
        $data->save();
        session()->flash('success',"<b class='text-danger'>$request->medicine_name</b> has been added successfully !!! ");
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
        $medicine = Medicine::find($id);
        $medicineCategory = MedicineCategory::all();
        $medicineUnit = MedicineUnit::all();
        $medicineLeaf = MedicineLeaf::all();
        $medicineType = MedicineType::all();
        $manufacturer = Manufacturer::all();
        return view('frontend.dashboard.pages.medicine.medicine.edit',compact('medicineCategory','medicineUnit','medicineLeaf','medicineType','manufacturer','medicine'));
    
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
            'medicine_name' => 'required|unique:medicines,medicine_name,'.$id,
            'barcode_id' => 'required',
            'strength' => 'required',
            'strength' => 'required',
            'generic_name' => 'required',
            'box_size' => 'required',
            'unit_id' => 'required',
            'category_id' => 'required',
            'type_id' => 'required',
            'manufacturer_id' => 'required',
            'product_location' => 'required',
            'product_details' => 'required',
            'price' => 'required',
            'manufacturer_price' => 'required',
            'tax0' => 'required',
            'tax1' => 'required',
            'status' => 'required'
        ]);
        $data = Medicine::find($id);
        $data->medicine_name = $request->medicine_name ;
        $data->barcode_id = $request->barcode_id ;
        $data->strength = $request->strength ;
        $data->generic_name = $request->generic_name ;
        $data->box_size = $request->box_size ;
        $data->unit_id = $request->unit_id ;
        $data->category_id = $request->category_id ;
        $data->type_id = $request->type_id ;
        $data->manufacturer_id = $request->manufacturer_id ;
        $data->product_location = $request->product_location ;
        $data->product_details = $request->product_details ;
        $data->price = $request->price ;
        $data->manufacturer_price = $request->manufacturer_price ;
        $data->tax0 = $request->tax0 ;
        $data->tax1 = $request->tax1 ;
        $data->status = $request->status;
        if($request->hasfile('image')){
            $image = $request->file('image');
            $file_name = time().'.'.$image->getClientOriginalExtension();
            $old_image = $data->image;
            if($old_image != ""){
                $path = "images/medicine/$old_image";
                unlink($path);
            }
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(300,300);
            $image_resize->save('images/medicine/'.$file_name);
            // $request->image->move('images/',$file_name);
            $data->image = $file_name; 
        }
        $data->save();
        session()->flash('success',"<b class='text-danger'>$request->medicine_name</b> has been Updated successfully !!! ");
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
