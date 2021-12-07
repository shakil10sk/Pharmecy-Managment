@extends('frontend.dashboard.master')


@section('content-section')

<h3>Add Customar</h3>
<form class="container" action="{{ url('/customar/store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('message.alert')
<div class="modal-body">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-1" class="control-label">Name<span class="text-danger"> *</span></label>
                <input type="text" class="form-control " name="customar_name" id="field-1" placeholder="John" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-2" class="control-label">Email<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" id="field-2" name="email" placeholder="john@gmail.com" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-3" class="control-label">Phone<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" id="field-3" name="phone" required placeholder="+8801700-000000">
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label for="field-5" class="control-label">City</label>
                <input type="text" class="form-control" id="field-5" name="custoamr_city" placeholder="Dhaka">

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="field-10" class="control-label">Photo</label>
                <input type="file" class="form-control" name="photo" id="field-10">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="field-4" class="control-label">Address<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" id="field-4"required  name="address" placeholder="Rajshahi">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-6" class="control-label">Account Number<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" id="field-6"required  name="ac_num" placeholder="73461254896325">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-8" class="control-label">Bank Name<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" id="field-8" required  name="bank_name" placeholder="IBBL">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-9" class="control-label">Bank Branch<span class="text-danger"> *</span></label>
                <input type="text" class="form-control" id="field-9" required name="bank_branch" placeholder="Sapahar">
            </div>
        </div>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
    </div>
</div>
</form>
@endsection
