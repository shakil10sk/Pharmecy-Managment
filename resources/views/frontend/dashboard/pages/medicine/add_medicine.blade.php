@extends('frontend.dashboard.master')

@section('title')
ADD Medicine
@endsection


@section('content-section')
<h1>ADD Medicine <a href="{{ url('/import-medicine') }}" class="btn btn-danger pull-right btn-sm">Import Excell File</a></h1><br>
@include('message.alert');

<form class="m-5" action="{{ url('/medicine/post') }}" method="POST" enctype="multipart/form-data">
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
        <Select name="category_id">
            <option value="">==Select Category==</option>
            @foreach($category as $key => $value)
            <option value="{{ $value->id }}">{{ $value->category }}</option>
            @endforeach
        </Select>
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
        <input type="number" class="form-control" id="price" aria-describedby="emailHelp" name="sell_price"
            placeholder="Enter Medicine selling price">
        <small id="price" class="form-text text-muted">Selling price</small>
    </div>
    <div class="form-group">
        <label for="manufecture_price">Manufecture price
        </label>
        <input type="number" class="form-control" id="manufecture_price" aria-describedby="emailHelp"
            name="manufecture_price" placeholder="Enter Medicine manufecture price">
        <small id="manufecture_price" class="form-text text-muted">Manufecture price</small>
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
        <input type="date" class="form-control" id="buy_date" aria-describedby="emailHelp"
            name="buy_date" placeholder="Enter Medicine Buying Date">
        <small id="buy_date" class="form-text text-muted">Buying Date</small>
    </div>
    <div class="form-group">
        <label for="buy_date">Manufecture Date
        </label>
        <input type="date" class="form-control" id="buy_date" aria-describedby="emailHelp"
            name="manufecturer_date" placeholder="Enter Medicine Manufecture Date">
        <small id="buy_date" class="form-text text-muted">Manufecture Date</small>
    </div>
    <div class="form-group">
        <label for="expire_date">Expire Date
        </label>
        <input type="date" class="form-control" id="expire_date" aria-describedby="emailHelp"
            name="expire_date" placeholder="Enter Product Expire Date">
        <small id="expire_date" class="form-text text-muted">Expire Date</small>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script type="text/javascript">
    function readURL(input) {
        if(input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection

