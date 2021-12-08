@extends('frontend.dashboard.master')

@section('title')
GLOBAL PHARMA
@endsection

@section('content-section')
<<<<<<< HEAD
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
=======

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Medicine List</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                <table id="datatable" class="table table-striped table-bordered table-responsive">
                    <thead>
                        <tr class="text-center">
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
                            <td style="width: 75px">Action</td>
                        </tr>
                    </thead>

                    <tbody>
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
                           <td style="width:75px">
                               <a href="{{ asset('/medicine/post/edit/'. $value->id ) }}"><i class="fa fa-pencil"></i></a> |
                               {{--  /medicine/post/{{ $value->id }}/edit --}}

                                <a href="{{ asset('/medicine/post/delete/'. $value->id ) }}"><i class="fa fa-trash" aria-hidden="true"></i>
</a> |
                                <a href="{{ asset('/medicine/show/'. $value->id ) }}"><i class="fa fa-eye" aria-hidden="true"></i>
</a> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $medicine->links() }} --}}
            </div>
        </div>
    </div>
>>>>>>> DemoPharmecy
</div>


@endsection

