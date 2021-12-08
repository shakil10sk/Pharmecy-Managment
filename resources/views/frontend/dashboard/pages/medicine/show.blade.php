@extends('frontend.dashboard.master')

@section('title')
GLOBAL PHARMA
@endsection

@section('content-section')

{{-- <div class="bg-info">
    <ul class="navbar">
        <li class=" list-unstyled font-dark nav-item"><a class="nav-link "  href="/home">Home</a></li>
        <li class=" list-unstyled font-dark nav-item"><a  class="nav-link " href="/medicine/show/{id}">{{ $show_data->medicine_name }}</a></li>
        <li class=" list-unstyled font-dark nav-item"><a class="nav-link "  href="/medicine/view">Medicine View</a></li>
        <li class=" list-unstyled font-dark nav-item"><a class="nav-link "  href=""></a></li>
    </ul>
</div> --}}
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
<<<<<<< HEAD
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li class="active"><a href="/medicine/show/{id}">{{ $show_data->medicine_name }}</a></li>
        <li><a href="{{ url('/medicine/view') }}">View Medicine List</a></li>
        <li><a href="{{ url('/medicine/add') }}">Add Medicine</a></li>
=======
        <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="active"><a href="/medicine/show/{id}">{{ $show_data->medicine_name }}</a></li>
        <li><a href="{{ asset('/medicine/view')}}">View Medicine List</a></li>
        <li><a href="{{ asset('/medicine/add')}}">Add Medicine</a></li>
>>>>>>> DemoPharmecy
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto text-center">
            <img class="img-fluid" src="{{ asset('public/images/'.$show_data->Images) }}" alt="" >
            <h1>{{ $show_data->medicine_name}}</h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12 mx-auto text-center">
            <ul class="list-unstyled">
                <li class=" list-group-item h4">Genric Name:   {{$show_data->genric_name}}</li>
                <li class=" list-group-item h4">Category Name:   {{$show_data->category}}</li>
                <li class=" list-group-item h4">Menufecturer Name:   {{$show_data->manufecture}}</li>
                <li class=" list-group-item h4">Self Number:   {{$show_data->self_number}}</li>
                <li class=" list-group-item h4">Quentity:   {{$show_data->qty}}</li>
                <li class=" list-group-item h4">Strength:   {{$show_data->strength}}</li>
                <li class=" list-group-item h4">Selling Price:   {{$show_data->sell_price}}</li>
                <li class=" list-group-item h4">Menufecturer Price:   {{$show_data->manufecture_price}}</li>
                <li class=" list-group-item h4">Product Code:   {{$show_data->Product_code}}</li>
                <li class=" list-group-item h4">Buying Date:   {{$show_data->buy_date}}</li>
                <li class=" list-group-item h4">Menufecturing Date:   {{$show_data->manufecturer_date}}</li>
                <li class=" list-group-item h4">Exprire Date:   {{$show_data->expire_date}}</li>

            </ul>
        </div>
    </div>

  </div>
  
{{-- <div class="table-responsive">
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
            <td>Selling Price</td>
            <td>Manufacturer price</td>
            <td>Product Code</td>
            <td>Buying Date</td>
            <td>Manufecture Date</td>
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
           <td><img src="{{ asset('images/'.$value->Images) }}" alt="" width="50" height="50"></td>
           <td><a href="/medicine/post/{{ $value->id }}/edit">Edit</a> | <a href="/medicine/post/{{ $value->id }}/delete/">Delete</a></td>
        </tr>
        @endforeach


    </table>
</div> --}}
{{-- {{ $data->links() }} --}}

@endsection

