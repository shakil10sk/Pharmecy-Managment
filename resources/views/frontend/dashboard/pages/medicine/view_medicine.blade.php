@extends('frontend.dashboard.master')

@section('title')
GLOBAL PHARMA
@endsection

@section('content-section')
<h1>View Medicine</h1><br>

<div class="table-responsive">
    <table class="table table-striped">
        <tr>
            <td class="">SI</td>
            <td>Medicne Name</td>
            <td>Generic Name</td>
            <td>Category</td>
            <td>Manufacturer</td>
            <td>Shelf</td>
            <td>Quentity</td>
            <td>Strength</td>
            <td>selling price</td>
            <td>Manufacturer price</td>
            <td>Product Code</td>
            <td>Buying Date</td>
            <td>manufecture Date</td>
            <td>Expire Date</td>
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
           <td>{{$value->qty}}</td>
           <td>{{$value->strength}}</td>
           <td>{{$value->sell_price}}</td>
           <td>{{$value->manufecture_price}}</td>
           <td>{{$value->Product_code}}</td>
           <td>{{$value->buy_date}}</td>
           <td>{{$value->manufecturer_date}}</td>
           <td>{{$value->expire_date}}</td>
           <td><img src="{{ asset('public/images/'.$value->Images) }}" alt="" width="50" height="50"></td>
           <td><a href="{{ url('/medicine/post/'. $value->id .'/edit') }}">Edit</a> | <a href="/medicine/post/{{ $value->id }}/delete/">Delete</a>|
            <br><a href="{{ url('/medicine/show/'.$value->id) }}">Show</a> </td>
        </tr>
        @endforeach


    </table>
</div>
{{-- {{ $data->links() }} --}}

@endsection

