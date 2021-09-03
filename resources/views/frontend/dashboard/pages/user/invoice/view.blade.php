<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <link rel="shortcut icon" href="{{ asset('images/favicon_1.ico') }}">
    <title>@yield('title') </title>
    @include('frontend.dashboard.partials.style');
</head>

<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Top Bar Start -->
        @include('frontend.dashboard.partials.topbar')




        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="pull-left page-title">Invoice</h4>
                            <ol class="breadcrumb pull-right">
                                <li><a href="/">GLOBAL PHARMA</a></li>
                                <li><a href="/POS">POS</a></li>
                                <li class="active">Invoice</li>
                            </ol>
                        </div>
                    </div>
                    {{-- @yield('content-section') --}}
                    <form class="container" action="{{ url('/final-invoice') }}" method="post">
                        @include('message.alert')
                        @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <!-- <div class="panel-heading">
                                            <h4>Invoice</h4>
                                        </div> -->
                                <div class="panel-body">
                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <h4 class="text-right">GLOBAL PHARMA</h4>
                                        </div>
                                        <div class="pull-right">
                                            <h4>Invoice # <br>
                                                <strong>{{ date('d/m/y') }}</strong>
                                            </h4>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="pull-left m-t-5">

                                                <address>
                                                    <strong>Name : {{ $customar->customar_name }}</strong><br>
                                                    Address : {{ $customar->address }}<br>
                                                    City : {{ $customar->custoamr_city }}<br>
                                                    Phone : {{ $customar->phone }}
                                                </address>

                                            </div>
                                            <div class="pull-right m-t-5">
                                                <p><strong>Order Date : </strong>
                                                    {{ date("l jS \of F Y") }}</p>
                                                <p class="m-t-5"><strong>Order Status : </strong> <span
                                                        class="label label-pink">Active</span></p>
                                                @php
                                                    // $order=DB::table('orders')->select('id')->first();
                                                    $i=1;
                                                @endphp

                                                <p class="m-t-5"><strong>Order ID : </strong> #202100{{ ++$i }}
                                                    {{-- {{ $order++ }} --}}

                                                </p>

                                                <p class="m-t-5"><strong>Sold By : </strong>
                                                {{ Auth::user()->name }}

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-h-5"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table m-t-5">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Item</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $sl=0;
                                                        @endphp
                                                        @foreach($contents as $row)
                                                            <tr>
                                                                <td>{{ ++$sl }}</td>
                                                                <td>{{ $row->name }}</td>
                                                                {{-- <form action="post" action="{{ asset('update/qty') }}"> --}}
                                                                    <input type="hidden" name="medicine_id" value="{{ $row->id }}">
                                                                {{-- </form> --}}
                                                                <td>{{ $row->qty }}
                                                                    @php
                                                                        DB::table('medicines')->decrement('qty', $row->qty);
                                                                    @endphp
                                                                    pcs</td>
                                                                <td>৳ {{ $row->price }}</td>
                                                                <td>৳ {{ $row->price*$row->qty }}</td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="border-radius: 0px;">
                                        <div class="col-md-3 col-md-offset-9">
                                            <h4 class="text-right"><b>Sub-total :</b> ৳{{ Cart::subtotal() }}</h4>
                                            {{-- <p class="text-right">Discout: 12.9%</p> --}}
                                            {{--<p class="text-right">Service Charge: {{ Cart::tax(2) }}</p>--}}
                                            <hr>
                                            <h3 class="text-right">Total : ৳{{ Cart::total(2) }}</h3>
                                        </div>
                                    </div>

                                    <div class="hidden-print">
                                        <div class="pull-right">
                                            <a href="#" onclick="window.print()"
                                                class="btn btn-inverse waves-effect waves-light"><i
                                                    class="fa fa-print"></i></a>
                                            <a href="#" class="btn btn-primary waves-effect waves-light"
                                                data-toggle="modal" data-target="#con-close-modal">Submit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- data model --}}


                    {{-- <form class="container" action="{{ url('/final-invoice') }}" method="post">
                        @include('message.alert')
                        @csrf --}}
                        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">×</button>
                                        <h4 class="modal-title text-info">Invoice Of {{ $customar->customar_name }}
                                            <span class="pull-right">Total: {{ Cart::total() }}</span></h4>
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
                                                    <label for="field-1" class="control-label">Payment<span
                                                            class="text-danger">
                                                            *</span></label>
                                                    <select name="payment_status" id="" class="form-control">
                                                        <option value="handcash"> Hand Cash </option>
                                                        <option value="cheack"> Cheack </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-2" class="control-label">Pay<span
                                                            class="text-danger">
                                                            *</span></label>
                                                    <input type="text" class="form-control" required id="field-2" name="pay"
                                                        placeholder="payment amount">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" required id="field-3" name="due"
                                                        value="0">
                                                </div>
                                            </div>

                                        </div>
                                        {{-- <input type="text" name="medicine_id" value=""> --}}
                                        @foreach($contents as $key => $value)
                                        <input type="hidden" value="{{ $value->id }}" name="medicine_id">
                                        @endforeach
                                        <input type="hidden" name="customar_id" value="{{ $customar->id }}">
                                        <input type="hidden" name="order_date"
                                            value="{{ date('d/m/y') }}">
                                        <input type="hidden" name="order_status" value="Active">
                                        <input type="hidden" name="total_products" value="{{ Cart::count() }}">
                                        <input type="hidden" name="sub_total" value="{{ Cart::subtotal() }}">
                                        <input type="hidden" name="vat" value="{{ Cart::tax() }}">
                                        <input type="hidden" name="total" value="{{ Cart::total() }}">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-info waves-effect waves-light">Save
                                                changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.modal -->
                    </form>
                </div> <!-- container -->
            </div> <!-- content -->
            {{-- footer section --}}
            @include('frontend.dashboard.partials.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

        <!-- Right Sidebar chat -->
        {{-- @include('frontend.dashboard.partials.chat') --}}
        <!-- /Right-bar -->

    </div>
    <!-- END wrapper -->


    @include('frontend.dashboard.partials.script')

</body>

</html>
