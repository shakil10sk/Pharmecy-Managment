@extends('frontend.dashboard.master')

@section('title')
ADD Medicine
@endsection


@section('content-section')
<h1>ADD Medicine</h1><br>
    <form class="m-5" action="/medicine/add" method="POST" enctype="multipart">
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
            <input type="text" class="form-control" id="Medicine_name" aria-describedby="emailHelp" name="category"
                placeholder="Enter MCategory">
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
            <label for="strength">strength
            </label>
            <input type="text" class="form-control" id="strength" aria-describedby="emailHelp" name="strength"
                placeholder="Enter strenth lavel">
            <small id="emailHelp" class="form-text text-muted">strength</small>
        </div>
        <div class="form-group">
            <label for="price">Medicine price
            </label>
            <input type="text" class="form-control" id="price" aria-describedby="emailHelp" name="medicine_price"
                placeholder="Enter Medicine price">
            <small id="emailHelp" class="form-text text-muted">Medicine price</small>
        </div>
        
        <div class="form-group">
            <img id="image" src="#" />
            <label for="images">Images</label>
            <input type="file" class="form-control upload" name="Images" accept="image/*" required onchange="readURL(this);"></div>
    
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    
<script type="text/javascript">
function readURL(input){
    if(input.files && input.files[0]){
        var reader =new fileReader();
        reader.onload= function(e){
            $('#image')
            .attr('src',e.target.result)
            .width(80)
            .height(80);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

    </script>

@endsection


