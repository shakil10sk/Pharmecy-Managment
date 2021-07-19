@extends('frontend.dashboard.master')
@section('title')
Manufacturer Add
@endsection

@section('content')
<div class="container">
    <div class="">
        <div class="row ">
            <div class="col-md-12 col-lg-12" >
                <div class=" panel panel-default  " style="padding:30px;">
                    <div class="card-header py-2" >
                        <div class="row m-b-10">
                            <div class="text-left col-md-6 col-lg-6 col-sm-6">
                                <h4 class="fs-17 font-weight-600 mb-0 pt-2 pb-2">Add Manufacturer</h4>
                            </div>
                            <div class="text-right col-md-6 col-lg-6 col-sm-6">
                                <a href="{{ route('customer.index') }}"
                                    class="btn btn-success btn-sm mr-1"><i
                                        class="fa fa-align-justify m-r-10"></i>Manufacturer List</a>
                                <button class="client-add-btn btn btn-success md-trigger" type="button"
                                    aria-hidden="true" data-toggle="modal" data-target="#csv_customer_modal"
                                    id="csvmodal-link"><i class="fa fa-plus"></i> Upload Csv</button>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="card-body">
                        @include('message.success')
                        <form action="{{ route('customer.update',$customer->id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            @method('put')
                            @csrf 
                            <div class="form-group row">
                                <label for="customer_name" class="col-md-2 text-right col-form-label">Manufacturer
                                    Name <i class="text-danger"> * </i>:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" name="customer_name" class="form-control"
                                            id="customer_name" placeholder="Manufacturer Name" value="{{ $customer->customer_name }}">
                                        <input type="hidden" name="old_name" value="">
                                    </div>
                                    @error('customer_name')
                                        <div class="alert text-danger m-b-0">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                                <label for="customer_mobile" class="col-md-2 text-right col-form-label">Mobile No <i
                                        class="text-danger"> * </i>:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" name="customer_mobile"
                                            class="form-control input-mask-trigger text-left valid_number"
                                            id="customer_mobile" placeholder="Mobile No" value="{{ $customer->customer_mobile }}"
                                            data-inputmask="'alias': 'decimal', 'groupSeparator': '', 'autoGroup': true"
                                            im-insert="true">
                                    </div>
                                    @error('customer_mobile')
                                        <div class="alert text-danger m-b-0">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="customer_email" class="col-md-2 text-right col-form-label">Email
                                    Address1:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="email" class="form-control input-mask-trigger"
                                            name="customer_email" id="email" data-inputmask="'alias': 'email'"
                                            im-insert="true" placeholder="Email" value="{{ $customer->customer_email }}">
                                    </div>
                                </div>
                                <label for="email_address" class="col-md-2 text-right col-form-label">Email
                                    Address2:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" class="form-control" name="email_address" id="email_address"
                                            placeholder="Email Address" value="{{ $customer->email_address }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-2 text-right col-form-label">Phone:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input class="form-control input-mask-trigger text-left valid_number" id="phone"
                                            type="text" name="phone" placeholder="Phone"
                                            data-inputmask="'alias': 'decimal', 'groupSeparator': '', 'autoGroup': true"
                                            im-insert="true" value="{{ $customer->phone }}">
                                    </div>
                                </div>
                                <label for="contact" class="col-md-2 text-right col-form-label">Contact:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input class="form-control" id="contact" type="text" name="contact"
                                            placeholder="Contact" value="{{ $customer->contact }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address1" class="col-md-2 text-right col-form-label">Address 1:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <textarea name="address" id="customer_address" class="form-control"
                                            placeholder="Address 1">{{ $customer->address }}</textarea>
                                    </div>
                                </div>
                                <label for="address2" class="col-md-2 text-right col-form-label">Address 2:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <textarea name="address2" id="address2" class="form-control"
                                            placeholder="Address 2">{{ $customer->address2 }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fax" class="col-md-2 text-right col-form-label">Fax:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" name="fax" class="form-control" id="fax" placeholder="Fax"
                                            value="{{ $customer->fax }}">
                                    </div>
                                </div>
                                <label for="city" class="col-md-2 text-right col-form-label">City:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" name="city" class="form-control" id="city" placeholder="City"
                                            value="{{ $customer->city }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="state" class="col-md-2 text-right col-form-label">State:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" name="state" class="form-control" id="state"
                                            placeholder="State" value="{{ $customer->state }}">
                                    </div>
                                </div>
                                <label for="zip" class="col-md-2 text-right col-form-label">Zip:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input name="zip" type="text" class="form-control" id="zip" placeholder="Zip"
                                            value="{{ $customer->zip }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="country" class="col-md-2 text-right col-form-label">Country:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input name="country" type="text" class="form-control " placeholder="Country"
                                            value="{{ $customer->country }}" id="country">
                                    </div>
                                </div>
                                <label for="previous_balance" class="col-md-2 text-right col-form-label">Previous
                                    Balance:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input name="previous_balance" type="number"
                                            class="form-control text-right input-mask-trigger"
                                            placeholder="Previous Balance"
                                            data-inputmask="'alias': 'decimal', 'groupSeparator': '', 'autoGroup': true"
                                            im-insert="true" value="{{ $customer->previous_balance }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 text-right">
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="">
                                        <button type="submit" class="btn btn-success">
                                            Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="csv_customer_modal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Upload Csv</h3>
                            <a href="#" class="close  md-close" data-dismiss="modal">×</a>
                        </div>
                        <div class="modal-body">
                            <div class="text-right mb-2">
                                <a href="https://pharmacyv5.bdtask.com/pharmacare-9.4_demo/assets/csvfile/customer_csv_sample.csv"
                                    class="btn btn-info pull-right"><i class="fa fa-download"></i> Download Sample
                                    File</a>
                            </div>
                            <form
                                action="https://pharmacyv5.bdtask.com/pharmacare-9.4_demo/customer/upload_customer"
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
