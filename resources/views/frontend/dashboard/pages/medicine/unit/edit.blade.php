@extends('frontend.dashboard.master')
@section('title')
   Add -> Medicine Category 
@endsection

@section('content')
<div class="container">
    <div class="">
        <div class="row ">
            <div class="col-md-12 col-lg-12" >
                <div class=" panel panel-default  " style="padding:30px;">
                    <div class="card-header py-2" >
                        <div class="row m-b-10">
                            <div class="text-left col-md-6 col-lg-6 col-sm-6">
                                <h4 class="fs-17 font-weight-600 mb-0 pt-2 pb-2">Add Medicine Category </h4>
                            </div>
                            <div class="text-right col-md-6 col-lg-6 col-sm-6">
                                <a href="{{ route('medicineUnit.index') }}"
                                    class="btn btn-success btn-sm mr-1"><i
                                        class="fa fa-align-justify m-r-10"></i>Medicine Category  List</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="card-body">
                        @include('message.success')
                        <form action="{{ route('medicineUnit.update',$medicineUnit->id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            @csrf 
                            @method('put')
                            <div class="form-group row">
                                <label for="name" class="col-md-3 text-right col-form-label">Medicine Category 
                                    Name <i class="text-danger"> * </i>:</label>
                                <div class="col-md-5">
                                    <div class="">
                                        <input type="text" name="unit" class="form-control"
                                            id="manufacturer_name" placeholder="Medicine Category  Name" value="{{ $medicineUnit->unit }}">
                                    </div>
                                    @error('name')
                                        <div class="alert text-danger m-b-0">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-md-3 text-right col-form-label">Status<i class="text-danger"> * </i>:</label>
                                <div class="col-md-5">
                                    <div class="">
                                        <input type="radio" name="status" 
                                            id="status" placeholder="Medicine Category  Name" value="1" {{ ($medicineUnit->status=="1")? "checked" : "" }} > Active  &nbsp; &nbsp;
                                        <input type="radio" name="status" 
                                            id="status" placeholder="Medicine Category  Name" value="0" {{ ($medicineUnit->status=="0")? "checked" : "" }}> InActive 
                                    </div>
                                    @error('manufacturer_name')
                                        <div class="alert text-danger m-b-0">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">
                                Update </button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection