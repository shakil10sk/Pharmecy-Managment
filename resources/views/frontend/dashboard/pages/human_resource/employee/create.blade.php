@extends('frontend.dashboard.master')
@section('title')
Add Employee
@endsection
@section('style')
<link href="{{ asset('frontend/assets/select2/select2.css') }}" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="container">
    <div class="">
        <div class="row ">
            <div class="col-md-12 col-lg-12">
                <div class=" panel panel-default  " style="padding:30px;">
                    <div class="card-header py-2">
                        <div class="row m-b-10">
                            <div class="text-left col-md-6 col-lg-6 col-sm-6">
                                <h4 class="fs-17 font-weight-600 mb-0 pt-2 pb-2">Add Employee</h4>
                            </div>
                            <div class="text-right col-md-6 col-lg-6 col-sm-6">
                                <a href="{{ route('employee.index') }}" class="btn btn-success btn-sm mr-1"><i
                                        class="fa fa-align-justify m-r-10"></i>Employee List</a>
                                <button class="client-add-btn btn btn-success md-trigger" type="button"
                                    aria-hidden="true" data-toggle="modal" data-target="#csv_customer_modal"
                                    id="csvmodal-link"><i class="fa fa-plus"></i> Upload Csv</button>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="card-body">
                        @include('message.success')
                        <form action="{{ route('employee.store') }}" enctype="multipart/form-data" method="post"
                            accept-charset="utf-8">
                            @csrf
                            <div class="form-group row">
                                <label for="first_name" class="col-md-2 text-right col-form-label">First
                                    Name <i class="text-danger"> * </i>:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" name="first_name" class="form-control" id="first_name"
                                            placeholder="First  Name" value="{{ old('first_name') }}">
                                        <input type="hidden" name="old_name" value="">
                                    </div>
                                    @error('first_name')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <label for="last_name" class="col-md-2 text-right col-form-label">Last Name <i
                                        class="text-danger"> * </i>:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" name="last_name"
                                            class="form-control input-mask-trigger text-left valid_number"
                                            id="last_name" placeholder="Last Name" value="{{ old('last_name') }}"
                                            data-inputmask="'alias': 'decimal', 'groupSeparator': '', 'autoGroup': true"
                                            im-insert="true">
                                    </div>
                                    @error('last_name')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="designation_id"
                                    class="col-md-2 text-right col-form-label">Designation</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <select name="designation_id" id="select2" class="select2 form-control">
                                            <option value=""> Select </option>
                                            @foreach ($designation as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('designation_id')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <label for="phone" class="col-md-2 text-right col-form-label"> Phone </label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            placeholder="Phone Number" value="{{ old('phone') }}">

                                    </div>
                                    @error('phone')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror

                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="salary_type" class="col-md-2 text-right col-form-label">Salary Type :
                                </label>
                                <div class="col-md-4">
                                    <div class="">
                                        <select name="salary_type" id="select2" class="select2 form-control">
                                            <option value=""> Select Your Type</option>
                                            <option value="hourly">Hourly</option>
                                            <option value="salary">Salary</option>
                                        </select>
                                    </div>
                                    @error('salary_type')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <label for="salary_value" class="col-md-2 text-right col-form-label"> Salary
                                    Rate</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" class="form-control" name="salary_value" id="salary_value"
                                            placeholder="Salary Rate " value="{{ old('salary_value') }}">

                                    </div>
                                    @error('salary_value')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror

                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-2 text-right col-form-label">Email : </label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input class="form-control input-mask-trigger text-left valid_number" id="email"
                                            type="text" name="email" placeholder="Email Address"
                                            data-inputmask="'alias': 'decimal', 'groupSeparator': '', 'autoGroup': true"
                                            im-insert="true" value="{{ old('email') }}">
                                    </div>
                                    @error('email')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror

                                </div>
                                <label for="blood" class="col-md-2 text-right col-form-label">Blood Group</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input class="form-control" id="blood" type="text" name="blood"
                                            placeholder="blood Group" class="form-control" value="{{ old('blood') }}" />
                                    </div>
                                    @error('blood')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-2 text-right col-form-label">Address Line 1<i
                                        class="text-danger"> </i>:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <textarea name="address" id="address" class="form-control"></textarea>
                                    </div>
                                    @error('address')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <label for="address2" class="col-md-2 text-right col-form-label">Address Line 2<i
                                        class="text-danger"> </i>:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <textarea name="address2" id="address" class="form-control"></textarea>
                                    </div>
                                    @error('address2')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="country" class="col-md-2 text-right col-form-label">Country:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" name="country" class="form-control" id="country"
                                            placeholder="Country" value="">
                                    </div>
                                    @error('country')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <label for="image" class="col-md-2 text-right col-form-label">Image:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input name="image" type="file" class="form-control" id="image"
                                            placeholder="Image" value="">
                                        <input name="old_image" type="hidden" class="form-control" value="">
                                    </div>
                                    @error('image')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-md-2 text-right col-form-label">City:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" name="city" class="form-control" id="country"
                                            placeholder="City" value="">
                                    </div>
                                    @error('city')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <label for="zip" class="col-md-2 text-right col-form-label">Zip:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input name="zip" type="text" class="form-control" id="zip" placeholder="Zip"
                                            value="">
                                    </div>
                                    @error('zip')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-md-2 text-right col-form-label">Status <i
                                        class="text-danger"> * </i>:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <label class="radio-inline my-2">
                                            <input type="radio" name="status" value="active" checked="checked" id="status">
                                            Active
                                        </label>
                                        <label class="radio-inline my-2">
                                            <input type="radio" name="status" value="inactive" id="status">
                                            Inactive
                                        </label>
                                    </div>
                                </div>
                                <label for="preview" class="col-md-2 text-right col-form-label">Preview:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <img id="imgshow" class="img-thambnail"
                                            src="{{ asset('images/employee.jpg') }}"
                                            alt="your image" height="70px" width="70px;">
                                    </div>
                                </div>
                            </div>
                            


                            <div class="form-group row">
                                <div class="col-md-6 text-right">
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="">
                                        <button type="submit" class="btn btn-success">
                                            Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="csv_customer_modal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Upload Csv</h3>
                            <a href="#" class="close  md-close" data-dismiss="modal">×</a>
                        </div>
                        <div class="modal-body">
                            <div class="text-right mb-2">
                                <a href="https://pharmacyv5.bdtask.com/pharmacare-9.4_demo/assets/csvfile/customer_csv_sample.csv"
                                    class="btn btn-info pull-right"><i class="fa fa-download"></i> Download Sample
                                    File</a>
                            </div>
                            <form action="https://pharmacyv5.bdtask.com/pharmacare-9.4_demo/employee/upload_customer"
                                class="form-vertical" id="csvmedicine" enctype="multipart/form-data" method="post"
                                accept-charset="utf-8">
                                <input type="hidden" name="app_csrf" value="5451d3a7a37d79d92b381ae01b64883e">
                                <div class="form-group row">
                                    <label for="import_csv" class="col-sm-4 col-form-label">Import Csv <i
                                            class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                        <input class="form-control" name="file" id="file" type="file"
                                            placeholder="Import Csv" required="" tabindex="1">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-danger" tabindex="5" data-dismiss="modal">Close</a>
                            <input type="submit" tabindex="6" class="btn btn-success" value="Submit">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });

    // Live Image Loader 
    $('document').ready(function () {
        $("#image").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgshow').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
    // Live Image Loader 
    $('document').ready(function () {
        $("#signature").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgshow').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

</script>
@endsection
