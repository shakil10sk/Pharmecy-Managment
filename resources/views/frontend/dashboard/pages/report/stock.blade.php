@extends('frontend.dashboard.master')

@section('title')
GLOBAL PHARMA
@endsection

@section('content-section')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Stock Out Medicines List</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                <table id="datatable" class="table table-striped table-bordered table-responsive">
                    <thead>
                        <tr class="text-center">
                            <td class="">SI</td>
                            <td>Medicine Name</td>
                            <td>Genric Name</td>
                            <td>manufecture</td>
                            <td>self_number</td>
                            <td>Quantity</td>
                            <td>strength</td>
                            <td>sell_price</td>
                            <td>manufecture_price</td>
                            <td>Product_code</td>
                            <td>buy_date</td>
                            <td>manufecturer_date</td>
                            <td>expire_date</td>
                            <td>Images</td>
                            <td>Action</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($stock as $key=>$value)
                        <tr>
                           <td>{{++$key}}</td>
                           <td>{{$value->medicine_name}}</td>
                           <td>{{$value->genric_name}}</td>
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
</div>


@endsection

