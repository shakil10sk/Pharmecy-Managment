@extends('frontend.dashboard.master')

@section('title')
Edit Medicine
@endsection


@section('content-section')
<h1>Edit Medicine <a href="{{ url('/medicine/view') }}" class="btn btn-danger pull-right btn-sm">View Medicine list</a></h1><br>
@include('message.alert');


<form class="m-5" action="{{ url('/medicine/post/'.$edit_id->id .'/') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="Medicine_name">Medicine Name</label>
        <input type="text" class="form-control" id="Medicine_name" aria-describedby="emailHelp"
            value="{{ $edit_id->medicine_name }}" name="medicine_name">
        <small id="emailHelp" class="form-text text-muted">Medicine Name</small>
    </div>
    <div class="form-group">
        <label for="genric_name">Genric Name</label>
        <input type="text" class="form-control" id="genric_name" aria-describedby="emailHelp" name="genric_name"
            value="{{ $edit_id->genric_name }}">
        <small id="emailHelp" class="form-text text-muted">Genric Name</small>
    </div>

    <div class="form-group">
        <label>Category</label>
        <Select name="category_id">
            @foreach($category as $value)
                @if($value->id==$edit_id->category_id)
                    <option value="{{ $value->id }}" selected="">{{ $value->category }}</option>
                @else
                    <option value="{{ $value->id }}">{{ $value->category }}</option>
                @endif
            @endforeach
        </Select>
    </div>
    <div class="form-group">
        <label for="category">Manufacturer</label>
        <input type="text" class="form-control" id="Medicine_name" name="manufecture" aria-describedby="emailHelp"
            value=" {{ $edit_id->manufecture }}">
        <small id="emailHelp" class="form-text text-muted">Manufacturer</small>
    </div>
    <div class="form-group">
        <label for="self_number">Shelf Number</label>
        <input type="text" class="form-control" id="self_number" name="self_number" aria-describedby="emailHelp"
            value="{{ $edit_id->self_number }}">
        <small id="emailHelp" class="form-text text-muted">Shelf Number</small>
    </div>
    <div class="form-group">
        <label for="qty">Quentity</label>
        <input type="number" class="form-control" id="qty" name="qty" aria-describedby="emailHelp"
            value="{{ $edit_id->qty }}">
        <small id="emailHelp" class="form-text text-muted">Quentity</small>
    </div>
    <div class="form-group">
        <label for="strength">strength
        </label>
        <input type="text" class="form-control" id="strength" aria-describedby="emailHelp" name="strength"
            value="{{ $edit_id->strength }}">
        <small id="emailHelp" class="form-text text-muted">strength</small>
    </div>
    <div class="form-group">
        <label for="price">Selling price
        </label>
        <input type="number" class="form-control" id="price" aria-describedby="emailHelp" name="sell_price"
            value="{{ $edit_id->sell_price }}">
        <small id="price" class="form-text text-muted">Selling price</small>
    </div>
    <div class="form-group">
        <label for="manufecture_price">Manufecture price
        </label>
        <input type="number" class="form-control" id="manufecture_price" aria-describedby="emailHelp"
            name="manufecture_price" value="{{ $edit_id->manufecture_price }}">
        <small id="manufecture_price" class="form-text text-muted">Manufecture price</small>
    </div>

    <div class="form-group">
        <img id="image" src="{{ asset('public/images/'.$edit_id->Images) }}"><br>

        <label for="images">Images</label>
        <input type="file" class="form-control upload" name="Images"
            accept="image/*"  onchange="readURL(this);">
    </div>

    {{-- <div class="form-group">
        <img id="image" src="#"><br>
        <label for="images">Images</label>
        <input type="file" class="form-control upload" name="Images" accept="image/*" required
            onchange="readURL(this);">
    </div> --}}

    <div class="form-group">
        <label for="Product_code">Product Code
        </label>
        <input type="text" class="form-control" id="Product_code" aria-describedby="emailHelp" name="Product_code"
            value="{{ $edit_id->Product_code }}">
        <small id="Product_code" class="form-text text-muted">Product Code</small>
    </div>
    <div class="form-group">
        <label for="buy_date">Buying Date
        </label>
        <input type="date" class="form-control" id="buy_date" aria-describedby="emailHelp" name="buy_date"
            value="{{ $edit_id->buy_date }}">
        <small id="buy_date" class="form-text text-muted">Buying Date</small>
    </div>
    <div class="form-group">
        <label for="buy_date">Manufecture Date
        </label>
        <input type="date" class="form-control" id="buy_date" aria-describedby="emailHelp" name="manufecturer_date"
            value="{{ $edit_id->manufecturer_date }}">
        <small id="buy_date" class="form-text text-muted">Manufecture Date</small>
    </div>
    <div class="form-group">
        <label for="expire_date">Expire Date
        </label>
        <input type="date" class="form-control" id="expire_date" aria-describedby="emailHelp" name="expire_date"
            value="{{ $edit_id->expire_date }}">
        <small id="expire_date" class="form-text text-muted">Expire Date</small>
    </div>
    <input type="submit" class="btn btn-primary" value="Update">
    {{-- <button type="submit" >UPDATE</button> --}}
</form>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image').attr('src', e.target.result).width(80).height(80);
            };
            reader.readAsedit_idURL(input.files[0]);
        }
    }
</script>

@endsection
