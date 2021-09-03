@extends('frontend.dashboard.master')


@section('content-section')


<form class="container" action="{{ asset('/customar/'. $customar->id ) }}" method="post" enctype="multipart/form-data">
    @csrf
<div class="modal-body">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-1" class="control-label">Name</label>
                <input type="text" class="form-control" name="customar_name" id="field-1" value="{{ $customar->customar_name }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-2" class="control-label">Email</label>
                <input type="text" class="form-control" id="field-2" name="email" value="{{ $customar->email }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-3" class="control-label">Phone</label>
                <input type="text" class="form-control" id="field-3" name="phone"  value="{{ $customar->phone }}">
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label for="field-5" class="control-label">City</label>
                <input type="text" class="form-control" id="field-5" name="custoamr_city" value="{{ $customar->custoamr_city }}">

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="field-10" class="control-label">Photo</label>
                <input class="form-control " id="field-10" name="photo"  value="{{ asset('images/'.$customar->photo) }}" type="file">
                <input class="form-control " id="field-10" name="photo"  value="{{ asset('images/'.$customar->photo) }}" type="text">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="field-4" class="control-label">Address</label>
                <input type="text" class="form-control" id="field-4" name="address" value="{{ $customar->address }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-6" class="control-label">Account Number</label>
                <input type="text" class="form-control" id="field-6" name="ac_num" value="{{ $customar->ac_num }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-8" class="control-label">Bank Name</label>
                <input type="text" class="form-control" id="field-8" name="bank_name" value="{{ $customar->bank_name }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-9" class="control-label">Bank Branch</label>
                <input type="text" class="form-control" id="field-9" name="bank_branch" value="{{ $customar->bank_branch }}">
            </div>
        </div>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        <button type="submit" value="Update" class="btn btn-info waves-effect waves-light">Save changes</button>
    </div>
</div>
</form>
@endsection

