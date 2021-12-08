@extends('frontend.dashboard.master')

@section('title')
GLOBAL PHARMA
@endsection

@section('content-section')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Order Details</h3>
    </div>
    <!-- <form action="{{ asset('/report') }}" method="post">
        @csrf
        <input type="date" name="from_date">
        <input type="date" name="to_date">

        <button type="submit" class="btn btn-success" value="Submit">Submit</button>
    </form> -->
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                <table id="datatable" class="table table-striped table-bordered table-responsive">
                    <thead>
                        <tr class="text-left">
                        <td>Customer Name</td>
                            <td>Customer email</td>
                            <td>address</td>
                            <td>Customer phone</td>
                            <td>Total Quantity</td>
                            <td>total payment</td>
                            <td>order date</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($data as $key=>$value)
                        <tr>
                           <td>{{++$key}}</td>
                           <td>{{$value->customar_name}}</td>
                           <td>{{$value->email}}</td>
                           <td>{{$value->address}}</td>
                           <td>{{$value->phone}}</td>
                           <td>{{$value->total_products}}</td>
                           <td>{{$value->total}}</td>
                           <td>{{$value->order_date}}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $medicine->links() }} --}}
            </div>
        </div>
    </div>
</div>


@endsection

