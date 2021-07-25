@extends('frontend.dashboard.master')
@section('title')
 Update Designation
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
                                <h4 class="fs-17 font-weight-600 mb-0 pt-2 pb-2">Update Designation </h4>
                            </div>
                            <div class="text-right col-md-6 col-lg-6 col-sm-6">
                                <a href="{{ route('designation.index') }}"
                                    class="btn btn-success btn-sm mr-1"><i
                                        class="fa fa-align-justify m-r-10"></i>Designation  List</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="card-body">
                        @include('message.success')
                        <form action="{{ route('designation.update',$designation->id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            @csrf 
                            @method('put')
                            <div class="form-group row">
                                <label for="name" class="col-md-3 text-right col-form-label">Medicine Category 
                                    Name <i class="text-danger"> * </i>:</label>
                                <div class="col-md-5">
                                    <div class="">
                                        <input type="text" name="name" class="form-control"
                                            id="manufacturer_name" placeholder="Medicine Category  Name" value="{{ $designation->name }}">
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
                                        <div class="">
                                            <textarea name="details" class="form-control text-left" id="details" cols="30" rows="5">{!! $designation->details !!}
                                            </textarea>
                                        </div>
                                        @error('details')
                                            <div class="alert text-danger m-b-0">
                                                <span>{{ $message }}</span>
                                            </div>
                                        @enderror
                                        
                                </div>
                            </div>
                            </div>
                            <div class="col-md-8 text-right">
                                <button type="submit" class="btn btn-success">
                                    Update </button>
                            </div>
                            <div class="form-group-row text-right">
                                
                                
                            </div>
                            <br><br>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
