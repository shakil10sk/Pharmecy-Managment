@extends('frontend.dashboard.master')

@section('title')
GLOBAL PHARMA
@endsection

@section('title-section')
<div class="row">
    <div class="col-sm-12 bg-info">
        <h4 class="pull-left page-title">POS(Point Of Sale)</h4>
        <ol class="breadcrumb pull-right">
            <li>
                <a href="/">GLOBAL PHRMA</a>
            </li>
            <li class="text-white">{{ date('d/m/y') }}</li>
        </ol>
    </div>
</div>
<br>

<br>
@endsection

@section('content-section')


<div class="row">

    <div class="col-md-5">
        {{-- <div class="panel">
                <h4 class="text-info">Customar
                    <a href="#" class="btn btn-sm btn-primary waves-effect waves-light pull-right" data-toggle="modal"
                        data-target="#con-close-modal">Add New</a>
                </h4>
                <select name="" id="" class="form-control">
                    <option value="" disabled="" selected="">===Select Customar===</option>
@foreach($customar as $cus)
                        <option value="{{ $cus->id }}">{{ $cus->customar_name }}</option>
        @endforeach
        </select>
    </div> --}}
    <div class="price_card text-center">
        <ul class="price-features" style="border:1px solid gray">
            <table class="table table-responsive">
                <thead class="bg-info">
                    <tr>
                        <th class="text-center text-white">Name</th>
                        <th class="text-center text-white">QTY</th>
                        <th class="text-center text-white">Price</th>
                        <th class="text-center text-white">Sub Total</th>
                        <th class="text-center text-white">Action</th>
                    </tr>
                </thead>
                @php
                    $cart=Cart::content()
                @endphp
                <tbody>
                    @foreach($cart as $shop)
                        <tr>
                            <td class="text-center">{{ $shop->name }}</td>
                            <td class="text-center">
                                <form action="{{ url('/cart-update/'.$shop->rowId ) }}"
                                    method="POST">
                                    @csrf
                                    <input type="number" name="qty" value="{{ $shop->qty }}" style="width: 50px">
                                    <button type="submit" class="btn btn-sm btn-success" style="margin-top:-2px;">
                                        <i class="fa fa-check "></i></button>
                                </form>
                            </td>
                            <td class="text-center">{{ $shop->price }}</td>
                            <td class="text-center">{{ $shop->price*$shop->qty }}</td>
                            <td class="text-center"><a
                                    href="{{ url('/cart-remove/'.$shop->rowId) }}"><i
                                        class="fa fa-trash fa-2x text-danger"></a></i>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </ul>
        <div class="pricing-footer  bg-info">
            <div class=" bg-primary">
                <p style="font-size:19px;"> Quantity: {{ Cart::count() }}</p>
                <p style="font-size:19px;"> SubTotal: {{ Cart::subtotal() }}</p>
                <p style="font-size:19px;"> Vat: {{ Cart::tax(0) }}</p>
                <hr>
            </div>
            <h2 class="text-white text-center m-0">Total:- {{ Cart::total() }} </h2>

            <form action="{{ url('/create-invoice') }}" method="post">
                @csrf
                <div class="panel"><br><br>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h4 class="text-info"> Select Customar
                        <a href="#" class="btn btn-sm btn-primary waves-effect waves-light pull-right"
                            data-toggle="modal" data-target="#con-close-modal">Add New</a>
                    </h4>
                    @php
                        $customar=DB::table('customars')->get();
                    @endphp
                    <select name="cus_id" id="" class="form-control">
                        <option value="" disabled="" selected="">===Select Customar===</option>
                        @foreach($customar as $cus)
                            <option value="{{ $cus->id }}">{{ $cus->customar_name }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <input type="hidden" name="customar_id" value="{{ $cus->id }}">
                --}}
        </div>
        <button type="submit" class="btn btn-success">Create Invoice</button>
    </div>
</div>

</form>


{{-- Medicine View Section --}}
<div class="col-md-7">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 ">
            <div class="portfolioFilter">
                @foreach($medicine as $key => $value)
                    {{-- <a href="#" data-filter="*" class="current">{{ $value->category }}</a>
                    --}}
                    <a href="#" data-filter=".webdesign"><span
                            class="h5 text-uppercase">{{ $value->category }}</span></a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Datatable</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>ADD</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($medicine as $key=>$value)
                                <tr class="text-center">
                                    <form action="/add-cart" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $value->id }}">
                                        <input type="hidden" name="name" value="{{ $value->medicine_name }}">
                                        <input type="hidden" name="qty" value="1">
                                        <input type="hidden" name="price" value="{{ $value->sell_price }}">
                                        <td>
                                            {{-- <a href="#"></a> --}}
                                            <img src="{{ asset('images/'.$value->Images) }}"
                                                alt="" width="50" height="50"><br>{{ ++$key }}
                                        </td>
                                        <td>{{ $value->medicine_name }}</td>
                                        <td>{{ $value->category }}</td>
                                        <td>{{ $value->sell_price }}</td>
                                        <td> <button type="submit" class="btn btn-sm"><i
                                                    class="fa fa-plus-square fa-2x text-info"></i></button> </td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $medicine->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
</div> <!-- End Row -->
<!-- End Medicine view Section-->

{{-- Customar Add Section --}}

<form class="container" action="/customar/store" method="post" enctype="multipart/form-data">
    @csrf
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add Customar</h4>
                </div>
                @if(session()->has('success'))
                    <div class="alert alert-success" style="color: green;font-weight: bold;">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Name<span class="text-danger">
                                        *</span></label>
                                <input type="text" class="form-control " name="customar_name" id="field-1"
                                    placeholder="John" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Email<span class="text-danger">
                                        *</span></label>
                                <input type="text" class="form-control" id="field-2" name="email"
                                    placeholder="john@gmail.com" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-3" class="control-label">Phone<span class="text-danger">
                                        *</span></label>
                                <input type="text" class="form-control" id="field-3" name="phone" required
                                    placeholder="+8801700-000000">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-5" class="control-label">City</label>
                                <input type="text" class="form-control" id="field-5" name="custoamr_city"
                                    placeholder="Dhaka">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <img src="#" id="image" alt="">
                                <label for="field-10" class="control-label">Photo</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-10" class="control-label">Photo</label>
                                <input type="file" class="form-control" name="photo" accept="image/*"
                                    onchange="readURL(this);" id="field-10">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-4" class="control-label">Address<span class="text-danger">
                                        *</span></label>
                                <input type="text" class="form-control" id="field-4" required name="address"
                                    placeholder="Rajshahi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-6" class="control-label">Account Number<span class="text-danger">
                                        *</span></label>
                                <input type="text" class="form-control" id="field-6" required name="ac_num"
                                    placeholder="73461254896325">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-8" class="control-label">Bank Name<span class="text-danger">
                                        *</span></label>
                                <input type="text" class="form-control" id="field-8" required name="bank_name"
                                    placeholder="IBBL">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-9" class="control-label">Bank Branch<span class="text-danger">
                                        *</span></label>
                                <input type="text" class="form-control" id="field-9" required name="bank_branch"
                                    placeholder="sapahar">
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                    </div>
                </div>

            </div>
        </div>
    </div><!-- /.modal -->
</form>

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
