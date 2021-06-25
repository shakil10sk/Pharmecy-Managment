@extends('frontend.dashboard.master')

@section('title')
GLOBAL PHARMA
@endsection

@section('content-section')
<h1>View Medicine</h1><br>

<table class="table table-striped">
    <tr>
        <td class="">SI</td>
        <td>Medicne Name</td>
        <td>Generic Name</td>
        <td>Category</td>
        <td>Manufacturer</td>
        <td>Shelf</td>
        <td>price</td>
        <td>Manufacturer price</td>
        <td>Strength</td>
        <td>Images</td>
        <td>Action</td>
    </tr>

    @foreach($data as $key=>$value)
    <tr>
       <td>{{++$key}}</td>
       <td>{{$value->medicine_name}}</td>
       <td>{{$value->genric_name}}</td>
       <td>{{$value->category}}</td>
       <td>{{$value->manufecture}}</td>
       <td>{{$value->self_number}}</td>
       <td>{{$value->medicine_price}}</td>
       <td>{{$value->menufecturer_price}}</td>
       <td>{{$value->strength}}</td>
       <td><img src="{{ asset('images/'.$value->Images) }}" alt="" width="50" height="50"></td>
       <td><a href="#edit">Edit</a> | <a href="#delete">Delete</a></td>
    </tr>
    @endforeach


</table>
{{ $data->links() }}

@endsection

