@extends('frontend.dashboard.master')

@section('title')
ADD Employee
@endsection

@section('title-section')
<div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title">Add Employee</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="{{ url('/') }}">GLOBAL PHARMA</a></li>
            <li class="active"><a href="{{ url('/employee/view') }}">View Emplyoee</a></li>
        </ol>
    </div>
</div>
@endsection

@section('content-section')
<!-- Form-validation -->
<div class="row">

    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">ADD employee</h3>
            </div>

            <div class="panel-body">
                <div class=" form">
                    @include('message.alert')
                    <a class="btn btn-primary" href="/employee/add">Refresh</a>

                    <form class="cmxform form-horizontal tasi-form " id="register" method="POST"
                        action="/employee/{{ $edit->id }}/" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-2">Name <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input type="text" id="name" class="form-control" name="name"
                                    value="{{ $edit->name }}" required="required">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="email" class="control-label col-lg-2">Email <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input type="email" id="email" class="form-control" name="email"
                                value="{{ $edit->email }}" required="required">
                            </div>

                        </div>
                        <div class="form-group ">
                            <label for="password" class="control-label col-lg-2">Password <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input type="password" id="password" class="form-control" name="password"
                                value="{{ $edit->password }}" required="required">
                            </div>

                        </div>
                        <div class="form-group ">
                            <label for="cpass" class="control-label col-lg-2">Confirm Password <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input type="password" id="cpass" class="form-control" name="password_confirmation"
                                value="{{ $edit->password }}" required="required">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="phone_number" class="control-label col-lg-2">Phone Number <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input type="tel" id="phone_number" class="form-control" name="phone"
                                value="{{ $edit->phone }}" required="required">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="address" class="control-label col-lg-2">Address <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <textarea type="text" id="address" class="form-control" name="address" cols="20"
                                    rows="2" >{{ $edit->address }}</textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <img src="#" id="image" alt=""><br>
                            <label for="photo" class="control-label col-lg-2">Photo <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control " id="photo" onchange="readURL(this);" accept="image/*"
                                    name="photo" type="file">
                            </div>
                        </div>


                        <div class="form-group ">
                            <label for="nid" class="control-label col-lg-2">NID Number <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input type="number" id="nid" class="input-field" name="nid_number"
                                value="{{ $edit->nid_number }}" required="required">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="city" class="control-label col-lg-2">City<span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input type="text" id="city" class="form-control" name="city"
                                value="{{ $edit->city }}" required="required">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="position" class="control-label col-lg-2">Position<span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input type="text" id="position" class="form-control" name="position"
                                value="{{ $edit->position }}" required="required">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-lg-offset-2 col-lg-10">
                                <input type="checkbox" class="check-box">
                                <span>I agree<a href="#">
                                        to the terms & conditions</a>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" value="update" class="submit-btn btn btn-purple">Update Profile</button>
                            </div>
                        </div>

                    </form>
                </div> <!-- .form -->

            </div> <!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col -->

</div> <!-- End row -->
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image').attr('src', e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection



{{-- form --}}
