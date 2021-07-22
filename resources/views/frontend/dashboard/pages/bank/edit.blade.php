@extends('frontend.dashboard.master')
@section('title')
Update Bank Details 
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
                                <h4 class="fs-17 font-weight-600 mb-0 pt-2 pb-2">Add Bank</h4>
                            </div>
                            <div class="text-right col-md-6 col-lg-6 col-sm-6">
                                <a href="{{ route('bank.index') }}"
                                    class="btn btn-success btn-sm mr-1"><i
                                        class="fa fa-align-justify m-r-10"></i>Bank List</a>
                                <button class="client-add-btn btn btn-success md-trigger" type="button"
                                    aria-hidden="true" data-toggle="modal" data-target="#csv_customer_modal"
                                    id="csvmodal-link"><i class="fa fa-plus"></i> Upload Csv</button>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="card-body">
                        @include('message.success')
                        <form action="{{ route('bank.update',$bank->id) }}"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            @method('put')
                            @csrf 
                            <div class="form-group row">
                                <label for="bank_name" class="col-md-2 text-right col-form-label">Bank
                                    Name <i class="text-danger"> * </i>:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" name="bank_name" class="form-control"
                                            id="bank_name" placeholder="Bank Name" value="{{ $bank->bank_name }}">
                                    </div>
                                    @error('bank_name')
                                        <div class="alert text-danger m-b-0">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                                <label for="account_name" class="col-md-2 text-right col-form-label">Account Name <i
                                        class="text-danger"> * </i>:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" name="account_name"
                                            class="form-control input-mask-trigger text-left valid_number"
                                            id="account_name" placeholder="Account Name" value="{{ $bank->account_name }}"
                                            data-inputmask="'alias': 'decimal', 'groupSeparator': '', 'autoGroup': true"
                                            im-insert="true">
                                    </div>
                                    @error('account_name')
                                        <div class="alert text-danger m-b-0">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="account_number" class="col-md-2 text-right col-form-label">Account Number : </label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="number" class="form-control input-mask-trigger"
                                            name="account_number" id="email" data-inputmask="'alias': 'email'"
                                            im-insert="true" placeholder="Account Number" value="{{ $bank->account_number }}">
                                    </div>
                                    @error('account_number')
                                        <div class="alert text-danger m-b-0">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                                <label for="branch_name" class="col-md-2 text-right col-form-label"> Branch : </label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" class="form-control" name="branch_name" id="branch_name"
                                            placeholder="Branch Name" value="{{ $bank->branch_name }}">
                                            
                                    </div>
                                    @error('branch_name')
                                        <div class="alert text-danger m-b-0">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                  
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <label for="signature" class="col-md-2 text-right col-form-label">Signature Picture : </label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input class="form-control input-mask-trigger text-left valid_number" id="signature"
                                            type="file" name="signature" placeholder="Phone"
                                            data-inputmask="'alias': 'decimal', 'groupSeparator': '', 'autoGroup': true"
                                            im-insert="true" value="{{ old('signature') }}">
                                    </div>
                                    @error('signature')
                                        <div class="alert text-danger m-b-0">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                    <br>
                                            <img src="{{ asset('images/bank/'.$bank->signature) }}" alt="" id="imgshow" style="width: 70px ; height: 60px ;">
                                </div>
                                <label for="active" class="col-md-2 text-right col-form-label">Status :</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input class="" id="active" type="radio" name="status"
                                            placeholder="Contact" value="active" {{ ($bank->status == "active") ? 'checked':'' }}> <label for="active">Active</label>
                                        <input class="" id="inactive" type="radio" name="status"
                                            placeholder="Contact" value="inactive" {{ ($bank->status == "inactive") ? 'checked':'' }}> <label for="inactive">Inactive</label>
                                    </div>
                                    @error('status')
                                        <div class="alert text-danger m-b-0">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
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
                                action="https://pharmacyv5.bdtask.com/pharmacare-9.4_demo/bank/upload_customer"
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
    <script>
        // Live Image Loader 
        $('document').ready(function () {
            $("#signature").change(function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#imgshow').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
@endsection
