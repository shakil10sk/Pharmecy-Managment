@extends('frontend.dashboard.master')

@section('title')
ADD Medicine
@endsection


@section('content-section')
<h1>ADD Medicine <a href="/import-medicine" class="btn btn-danger pull-right btn-sm">Import Excell File</a></h1><br>
@include('message.alert');
<div class="card">
    <div class="card-header py-2">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="fs-17 font-weight-600 mb-0">Add Manufacturer</h6>
            </div>
            <div class="text-right">
                <a href="https://pharmacyv5.bdtask.com/pharmacare-9.4_demo/manufacturer/manufacturer_list"
                    class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i>Manufacturer List</a>
                <button class="client-add-btn btn btn-success md-trigger" type="button" aria-hidden="true"
                    data-toggle="modal" data-target="#csv_manufacturer_modal" id="csvmodal-link"><i
                        class="fas fa-plus"></i> Upload Csv</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="https://pharmacyv5.bdtask.com/pharmacare-9.4_demo/manufacturer/add_manufacturer/"
            enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" name="app_csrf" value="cfc9c6a3b7b659f9f8c0a01c19764835">
            <input type="hidden" name="manufacturer_id" id="manufacturer_id" value="">
            <div class="form-group row">
                <label for="manufacturer_name" class="col-md-2 text-right col-form-label">Manufacturer Name <i
                        class="text-danger"> * </i>:</label>
                <div class="col-md-4">
                    <div class="">
                        <input type="text" name="manufacturer_name" class="form-control" id="manufacturer_name"
                            placeholder="Manufacturer Name" value="">
                        <input type="hidden" name="old_name" value="">
                    </div>
                </div>
                <label for="manufacturer_mobile" class="col-md-2 text-right col-form-label">Mobile No <i
                        class="text-danger"> * </i>:</label>
                <div class="col-md-4">
                    <div class="">
                        <input type="text" name="manufacturer_mobile"
                            class="form-control input-mask-trigger text-left valid_number" id="manufacturer_mobile"
                            placeholder="Mobile No" value=""
                            data-inputmask="'alias': 'decimal', 'groupSeparator': '', 'autoGroup': true"
                            im-insert="true">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="manufacturer_email" class="col-md-2 text-right col-form-label">Email Address1:</label>
                <div class="col-md-4">
                    <div class="">
                        <input type="email" class="form-control input-mask-trigger" name="manufacturer_email" id="email"
                            data-inputmask="'alias': 'email'" im-insert="true" placeholder="Email" value="">
                    </div>
                </div>
                <label for="email_address" class="col-md-2 text-right col-form-label">Email Address2:</label>
                <div class="col-md-4">
                    <div class="">
                        <input type="text" class="form-control" name="email_address" id="email_address"
                            placeholder="Email Address" value="">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-md-2 text-right col-form-label">Phone:</label>
                <div class="col-md-4">
                    <div class="">
                        <input class="form-control input-mask-trigger text-left valid_number" id="phone" type="text"
                            name="phone" placeholder="Phone"
                            data-inputmask="'alias': 'decimal', 'groupSeparator': '', 'autoGroup': true"
                            im-insert="true" value="">
                    </div>
                </div>
                <label for="contact" class="col-md-2 text-right col-form-label">Contact:</label>
                <div class="col-md-4">
                    <div class="">
                        <input class="form-control" id="contact" type="text" name="contact" placeholder="Contact"
                            value="">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="address1" class="col-md-2 text-right col-form-label">Address 1:</label>
                <div class="col-md-4">
                    <div class="">
                        <textarea name="address" id="manufacturer_address" class="form-control"
                            placeholder="Address 1"></textarea>
                    </div>
                </div>
                <label for="address2" class="col-md-2 text-right col-form-label">Address 2:</label>
                <div class="col-md-4">
                    <div class="">
                        <textarea name="address2" id="address2" class="form-control" placeholder="Address 2"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="fax" class="col-md-2 text-right col-form-label">Fax:</label>
                <div class="col-md-4">
                    <div class="">
                        <input type="text" name="fax" class="form-control" id="fax" placeholder="Fax" value="">
                    </div>
                </div>
                <label for="city" class="col-md-2 text-right col-form-label">City:</label>
                <div class="col-md-4">
                    <div class="">
                        <input type="text" name="city" class="form-control" id="city" placeholder="City" value="">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="state" class="col-md-2 text-right col-form-label">State:</label>
                <div class="col-md-4">
                    <div class="">
                        <input type="text" name="state" class="form-control" id="state" placeholder="State" value="">
                    </div>
                </div>
                <label for="zip" class="col-md-2 text-right col-form-label">Zip:</label>
                <div class="col-md-4">
                    <div class="">
                        <input name="zip" type="text" class="form-control" id="zip" placeholder="Zip" value="">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="country" class="col-md-2 text-right col-form-label">Country:</label>
                <div class="col-md-4">
                    <div class="">
                        <input name="country" type="text" class="form-control " placeholder="Country" value=""
                            id="country">
                    </div>
                </div>
                <label for="previous_balance" class="col-md-2 text-right col-form-label">Previous Balance:</label>
                <div class="col-md-4">
                    <div class="">
                        <input name="previous_balance" type="number" class="form-control text-right input-mask-trigger"
                            placeholder="Previous Balance"
                            data-inputmask="'alias': 'decimal', 'groupSeparator': '', 'autoGroup': true"
                            im-insert="true">
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
{{-- <form class="m-5" action="/medicine/post" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="Medicine_name">Medicine Name</label>
        <input type="text" class="form-control" id="Medicine_name" aria-describedby="emailHelp" name="medicine_name"
            placeholder="Enter Medicine Name">
        <small id="emailHelp" class="form-text text-muted">Medicine Name</small>
    </div>
    <div class="form-group">
        <label for="genric_name">Genric Name</label>
        <input type="text" class="form-control" id="genric_name" aria-describedby="emailHelp" name="genric_name"
            placeholder="Enter Genric Name">
        <small id="emailHelp" class="form-text text-muted">Genric Name</small>
    </div>
    <div class="form-group">
        <label for="Medicine_name">Category</label>
        <input type="text" class="form-control" id="Medicine_name" aria-describedby="emailHelp" name="category_id"
            placeholder="Enter Medicine Category">
        <small id="emailHelp" class="form-text text-muted">Category</small>
    </div>
    <div class="form-group">
        <label for="category">Manufacturer</label>
        <input type="text" class="form-control" id="Medicine_name" name="manufecture" aria-describedby="emailHelp"
            placeholder="Enter Manufacturer">
        <small id="emailHelp" class="form-text text-muted">Manufacturer</small>
    </div>
    <div class="form-group">
        <label for="self_number">Shelf Number</label>
        <input type="text" class="form-control" id="self_number" name="self_number" aria-describedby="emailHelp"
            placeholder="Enter self number">
        <small id="emailHelp" class="form-text text-muted">Shelf Number</small>
    </div>
    <div class="form-group">
        <label for="qty">Quentity</label>
        <input type="number" class="form-control" id="qty" name="qty" aria-describedby="emailHelp"
            placeholder="Enter Product Quentity">
        <small id="emailHelp" class="form-text text-muted">Quentity</small>
    </div>
    <div class="form-group">
        <label for="strength">strength
        </label>
        <input type="text" class="form-control" id="strength" aria-describedby="emailHelp" name="strength"
            placeholder="Enter strenth lavel">
        <small id="emailHelp" class="form-text text-muted">strength</small>
    </div>
    <div class="form-group">
        <label for="price">Selling price
        </label>
        <input type="text" class="form-control" id="price" aria-describedby="emailHelp" name="sell_price"
            placeholder="Enter Medicine selling price">
        <small id="price" class="form-text text-muted">Selling price</small>
    </div>
    <div class="form-group">
        <label for="buy_price">Buying price
        </label>
        <input type="text" class="form-control" id="buy_price" aria-describedby="emailHelp"
            name="buy_price" placeholder="Enter Medicine Buying price">
        <small id="buy_price" class="form-text text-muted">Buying price</small>
    </div>

    <div class="form-group">
        <img id="image" src="#"><br>
        <label for="images">Images</label>
        <input type="file" class="form-control upload" name="Images" accept="image/*" required
            onchange="readURL(this);">
    </div>
    <div class="form-group">
        <label for="Product_code">Product Code
        </label>
        <input type="text" class="form-control" id="Product_code" aria-describedby="emailHelp"
            name="Product_code" placeholder="Enter Product Code">
        <small id="Product_code" class="form-text text-muted">Product Code</small>
    </div>
    <div class="form-group">
        <label for="buy_date">Buying Date
        </label>
        <input type="text" class="form-control" id="buy_date" aria-describedby="emailHelp"
            name="buy_date" placeholder="Enter Medicine Buying Date">
        <small id="buy_date" class="form-text text-muted">Buying Date</small>
    </div>
    <div class="form-group">
        <label for="expire_date">Expire Date
        </label>
        <input type="text" class="form-control" id="expire_date" aria-describedby="emailHelp"
            name="expire_date" placeholder="Enter Product Expire Date">
        <small id="expire_date" class="form-text text-muted">Expire Date</small>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form> --}}

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
