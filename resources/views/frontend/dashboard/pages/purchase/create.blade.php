@extends('frontend.dashboard.master')
@section('title')
Add Medicine
@endsection
@section('style')
<link href="{{ asset('frontend/assets/timepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
<link href="{{ asset('frontend/assets/select2/select2.css') }}" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="container">
    <div class="">
        <div class="row ">
            <div class="col-md-12 col-lg-12">
                <div class=" panel panel-default  " style="padding:30px;">
                    <div class="card-header py-2">
                        <div class="row m-b-10">
                            <div class="text-left col-md-6 col-lg-6 col-sm-6">
                                <h4 class="fs-17 font-weight-600 mb-0 pt-2 pb-2">Add Medicine</h4>
                            </div>
                            <div class="text-right col-md-6 col-lg-6 col-sm-6">
                                <a href="{{ route('medicine.index') }}" class="btn btn-success btn-sm mr-1"><i
                                        class="fa fa-align-justify m-r-10"></i>Medicine List</a>
                                <button class="client-add-btn btn btn-success md-trigger" type="button"
                                    aria-hidden="true" data-toggle="modal" data-target="#csv_manufacturer_modal"
                                    id="csvmodal-link"><i class="fa fa-plus"></i> Upload Csv</button>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="card-body">
                        @include('message.success')
                        <form action="{{ route('medicine.store') }}" enctype="multipart/form-data" method="post"
                            accept-charset="utf-8">
                            @csrf

                            <div class="form-group row">
                                <label for="unit" class="col-md-2 text-right col-form-label">Medicine <i
                                        class="text-danger"> *
                                    </i>:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <select name="manufacturer_id" id="" class="select2 form-control">
                                            <option value=""> Select Manufacturer </option>
                                            @foreach($manufacturer as $value)
                                            <option value="{{ $value->id }}">{{ $value->manufacturer_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('manufacturer_id')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <label for="date" class="col-md-2 text-right col-form-label">Medicine
                                    Details:</label>
                                <div class="col-md-4">
                                    <div class="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-multiple">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div><!-- input-group -->
                                    </div>
                                    @error('manufacturer_price')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="invoice_no" class="col-md-2 text-right col-form-label">Invoice No<i
                                        class="text-danger"> * </i>:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" class="form-control valid_number" name="invoice_no"
                                            id="invoice_no" placeholder="Invoice No" value="" tabindex="3">
                                    </div>
                                </div>
                                <label for="details" class="col-md-2 text-right col-form-label">Details:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" class="form-control" name="details" id="details"
                                            placeholder="Details" value="" tabindex="4">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="unit" class="col-md-2 text-right col-form-label">Payment :  <i
                                        class="text-danger"> *
                                    </i>:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <select name="manufacturer_id" id="payment_type" class="select2 form-control">
                                            <option value=""> Select Payment</option>
                                            <option value="cash"> Cash Payment</option>
                                            <option value="bank"> Bank Payment</option>
                                            
                                        </select>
                                    </div>
                                    @error('manufacturer_id')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div id="bank" >
                                    {{-- There will be append bank  --}}
                                </div>
                                
                            </div>
                            <table class="table table-light table-bordered table-responsive">
                                <thead class="thead-light" style="font-size: 10px">
                                    <tr >
                                        <th>Medicine Info<i class="text-danger">*</i></th>
                                        <th>Batch Id<i class="text-danger">*</i></th>
                                        <th>Expiry Date<i class="text-danger">*</i> </th>
                                        <th>Stock Qty <i class="text-danger">*</i></th>
                                        <th>Box Pattern <i class="text-danger">*</i></th>
                                        <th>Box Pattern <i class="text-danger">*</i></th>
                                        <th>Box Qty <i class="text-danger">*</i></th>
                                        <th>Quantity <i class="text-danger">*</i></th>
                                        <th>Manufacturer Price <i class="text-danger">*</i></th>
                                        <th>Box Mrp <i class="text-danger">*</i></th>
                                        <th>Total Purchase Price  <i class="text-danger">*</i></th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="form-group row">
                                <div class="col-md-6 text-right">
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="">
                                        <button type="submit" class="btn btn-success">
                                            Save</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="csv_manufacturer_modal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Upload Csv</h3>
                            <a href="#" class="close  md-close" data-dismiss="modal">×</a>
                        </div>
                        <div class="modal-body">
                            <div class="text-right mb-2">
                                <a href=""
                                    class="btn btn-info pull-right"><i class="fa fa-download"></i> Download Sample
                                    File</a>
                            </div>
                            <form
                                action=""
                                class="form-vertical" id="csvmedicine" enctype="multipart/form-data" method="post"
                                accept-charset="utf-8">
                                <input type="hidden" name="app_csrf" value="5451d3a7a37d79d92b381ae01b64883e">
                                <div class="form-group row">
                                    <label for="import_csv" class="col-sm-4 col-form-label">Import Csv <i
                                            class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                        <input class="form-control" name="file" id="file" type="file"
                                            placeholder="Import Csv" required="" tabindex="1">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-danger" tabindex="5" data-dismiss="modal">Close</a>
                            <input type="submit" tabindex="6" class="btn btn-success" value="Submit">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('frontend/assets/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('frontend/assets/timepicker/bootstrap-datepicker.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });
// datepicker
            jQuery('#datepicker-multiple').datepicker({
                numberOfMonths: 3,
                showButtonPanel: true
            });
    // Live Image Loader 
    $('document').ready(function () {
        $("#image").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgshow').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
    $('document').ready(function(){
        var bank = `<label for="date" class="col-md-2 text-right col-form-label">Select Bank</label>
                                    <div class="col-md-4 ">
                                        <div class="">
                                            <select name="bank_id" id="" class="select2 form-control">
                                                <option value=""> Select Bank </option>
                                                @foreach ($bank as $value)
                                                    <option value="{{ $value->id }}">{{ $value->bank_name }}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                        @error('manufacturer_price')
                                        <div class="alert text-danger m-b-0">
                                            <span>{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>`;
        $('#payment_type').change(function(e){
            var value = e.target.value ;
            
            if(value != 'bank'){
                $('#bank').empty();
            }
            if(value == 'bank'){
                $('#bank').empty();
                $('#bank').append(bank);
            }
            
        })
    })

</script>
@endsection
