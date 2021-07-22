<?php

namespace App\Http\Controllers\Dashboard\Bank;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;
use Image ;
class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank = Bank::all();
        return view('frontend.dashboard.pages.bank.view',compact('bank'));
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
        return view('frontend.dashboard.pages.bank.create');
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
            'bank_name' => 'required|unique:banks',
            'account_name' => 'required',
            'account_number' => 'required|unique:banks',
            'branch_name' => 'required',
            'signature' => 'required',
            'status' => 'required',
        ],[
            'signature' => 'You Have To Upload Signature image'
        ]);

        $data = new Bank();
        $data->bank_name = $request->bank_name ;
        $data->account_name = $request->account_name ;
        $data->account_number = $request->account_number ;
        $data->branch_name = $request->branch_name ;
        $data->status = $request->status ;
       
        if($request->hasFile('signature')){
            $image=$request->file('signature');
            // return $image ;
            $original_name = $image->getClientOriginalName() ;
            $file_name = time().'.'.$image->getClientOriginalExtension();
            // return $file_name ;

            $image_resize= Image::make($image->getRealPath());
            $image_resize->resize(300,200);

            $image_resize->save('images/bank/'.$file_name);
            $data->signature = $file_name;
            

        }
        $data->save();
        session()->flash('success',"<b class='text-danger'>$request->bank_name</b> has been added successfully !!! ");
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
        $bank = Bank::find($id);
        return view('frontend.dashboard.pages.bank.edit',compact('bank'));
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
            'bank_name' => 'required|unique:banks,bank_name,'.$id,
            'account_name' => 'required',
            'account_number' => 'required|unique:banks,bank_name,'.$id,
            'branch_name' => 'required',
            'signature' => 'required|dimensions:min_width=100,min_height=200',
            'status' => 'required',
        ],[
            'signature' => 'You Have To Upload Signature image'
        ]);

        $data = Bank::find($id);
        
        $data->bank_name = $request->bank_name ;
        $data->account_name = $request->account_name ;
        $data->account_number = $request->account_number ;
        $data->branch_name = $request->branch_name ;
        $data->status = $request->status ;
       
        if($request->hasFile('signature')){
            $image=$request->file('signature');
            // return $image ;
            $original_name = $image->getClientOriginalName() ;
            $file_name = time().'.'.$image->getClientOriginalExtension();
            $old_image = $data->signature;
            if($old_image != ""){
                $randPic = $data->signature ;
                $firstLatter = substr($randPic,0,4);
                if($firstLatter != "http"){
                    $path = "images/bank/$old_image";
                    unlink($path);
                }
                
            }
            // return $file_name ;

            $image_resize= Image::make($image->getRealPath());
            $image_resize->resize(300,200);

            $image_resize->save('images/bank/'.$file_name);
            $data->signature = $file_name;
            

        }
        $data->save();
        session()->flash('success',"<b class='text-danger'>$request->bank_name</b> has been Updated successfully !!! ");
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
        $data = Bank::find($id);
        $data->delete();
        session()->flash('success',"<b style='color:red'> $data->bank_name </b> Manufacture has been Deleted Successfully  This ");
        return back();

    }
    
}
