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
                    <a class="btn btn-primary" href="{{ url('/employee/add') }}">Refresh</a>
                    <form class="cmxform form-horizontal tasi-form"  method="post" action="{{ url('/employee/view') }}"
                    enctype="multipart/form-data">
                        @csrf
                        <div class="form-group ">
                            <label for="firstname" class="control-label col-lg-2">Firstname <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class=" form-control" id="firstname" name="firstname" type="text">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="lastname" class="control-label col-lg-2">Lastname</label>
                            <div class="col-lg-10">
                                <input class=" form-control" id="lastname" name="lastname" type="text">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="username" class="control-label col-lg-2">Username <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control " id="username" name="username" type="text">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="email" class="control-label col-lg-2">Email <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control " id="email" name="email" type="email">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="pass" class="control-label col-lg-2">Password <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control " id="password" name="password" type="password" placeholder="enter password">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="cpass" class="control-label col-lg-2">Confirm Password <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control " id="password" name="confirm_password" type="password" placeholder="enter Confirm password">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="phone" class="control-label col-lg-2">Phone <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control" id="phone" name="phone" type="tel">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="address" class="control-label col-lg-2">Address <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <textarea class="form-control" name="address" id="address" cols="20"
                                    rows="2"></textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="experience" class="control-label col-lg-2">Experience </label>
                            <div class="col-lg-10">
                                <input class="form-control " id="experience" name="experience" type="text">
                            </div>
                        </div>
                        <div class="form-group ">
                            <img src="#" id="image" alt=""><br>
                            <label for="photo" class="control-label col-lg-2">Photo <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control " id="photo" onchange="readURL(this);"  accept="image/*" name="photo" type="file">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="salary" class="control-label col-lg-2">Salary <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control " id="salary" name="salary" type="text">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="nid_number" class="control-label col-lg-2">NID NUmber <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control " id="nid_number" name="nid_number" type="number">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="vacation" class="control-label col-lg-2">Vacation <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control " id="vacation" name="vacation" type="text">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="city" class="control-label col-lg-2">City <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control " id="city" name="city" type="text">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="position" class="control-label col-lg-2">Position <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control " id="position" name="position" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-success waves-effect waves-light" type="submit">Save</button>
                                <button class="btn btn-default waves-effect" type="button">Cancel</button>
                                <button class="btn btn-default waves-effect" type="reset">Reset</button>
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
