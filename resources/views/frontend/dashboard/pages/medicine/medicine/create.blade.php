@extends('frontend.dashboard.master')
@section('title')
Add Medicine
@endsection
@section('style')
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
                                <label for="medicine_name" class="col-md-2 text-right col-form-label">Medicine
                                    Name <i class="text-danger"> * </i>:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" name="medicine_name" class="form-control" id="medicine_name"
                                            placeholder="Medicine Name" value="{{ old('medicine_name') }}">
                                        <input type="hidden" name="old_name" value="">
                                    </div>
                                    @error('medicine_name')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <label for="barcode_id" class="col-md-2 text-right col-form-label">Barcode No <i
                                        class="text-danger"> * </i>:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" name="barcode_id"
                                            class="form-control input-mask-trigger text-left valid_number"
                                            id="barcode_id" placeholder="Barcode No" value="{{ old('barcode_id') }}"
                                            data-inputmask="'alias': 'decimal', 'groupSeparator': '', 'autoGroup': true"
                                            im-insert="true">
                                    </div>
                                    @error('barcode_id')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="strength" class="col-md-2 text-right col-form-label">Strength</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="strength" class="form-control input-mask-trigger" name="strength"
                                            id="strength" data-inputmask="'alias': 'strength'" im-insert="true"
                                            placeholder="Strength" value="{{ old('strength') }}">
                                        @error('strength')
                                        <div class="alert text-danger m-b-0">
                                            <span>{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <label for="generic_name" class="col-md-2 text-right col-form-label">Generic Name
                                </label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" class="form-control" name="generic_name" id="generic_name"
                                            placeholder="Generic Name" value="{{ old('generic_name') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="box_size" class="col-md-2 text-right col-form-label">Box Size <i
                                        class="text-danger"> *
                                    </i>:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <select name="box_size" id="" class="select2 form-control">
                                            <option value="">Select Box </option>
                                            @foreach($medicineLeaf as $value)
                                            <option value="{{ $value->id }}">
                                                {{ $value->leaf_type }}({{ $value->total_number }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('box_size')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <label for="unit" class="col-md-2 text-right col-form-label">Unit Name <i
                                        class="text-danger"> *
                                    </i>:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <select name="unit_id" id="" class="select2 form-control">
                                            <option value="">Select Unit</option>
                                            @foreach($medicineUnit as $value)

                                            @if($value->status == 1)
                                            <option value="{{ $value->id }}">{{ $value->unit }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('unit_id')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_location" class="col-md-2 text-right col-form-label">Shelf:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input class="form-control" id="product_location" type="text"
                                            name="product_location" placeholder="Shelf" value="">
                                    </div>
                                    @error('product_location')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <label for="product_details" class="col-md-2 text-right col-form-label">Medicine
                                    Details:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" name="product_details" class="form-control"
                                            id="product_details" placeholder="Medicine Details" value="">
                                    </div>
                                    @error('product_details')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category_id" class="col-md-2 text-right col-form-label">Select Category <i
                                        class="text-danger"> *
                                    </i>:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <select name="category_id" id="" class="select2 form-control">
                                            <option value="">Select Category</option>
                                            @foreach($medicineCategory as $value)

                                            @if($value->status == 1)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category_id')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <label for="price" class="col-md-2 text-right col-form-label">Price <i
                                        class="text-danger"> *
                                    </i>:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" class="form-control" name="price" id="price"
                                            placeholder="Price">
                                    </div>
                                    @error('price')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type_id" class="col-md-2 text-right col-form-label"> Medicine Type <i
                                        class="text-danger"> *
                                    </i>:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <select name="type_id" id="type_id" class="select2 form-control">
                                            <option value=""> Select Product Type </option>
                                            @foreach($medicineType as $value)

                                            @if($value->status == 1)
                                            <option value="{{ $value->id }}">{{ $value->type }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('type_id')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <label for="image" class="col-md-2 text-right col-form-label">Medicine
                                    Details:</label>
                                <div class="col-md-4">
                                    <div class="row m-0 p-0">
                                        <div class="col-md-9">
                                            <input type="file" name="image" class="form-control" id="image"
                                                placeholder="Price" value="">
                                        </div>
                                        <div class="col-md-3">
                                            <img src="" alt="" id="imgshow" style="width:70px ; height:70px">
                                        </div>
                                    </div>
                                    @error('image')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="unit" class="col-md-2 text-right col-form-label">Medicine <i
                                        class="text-danger"> *
                                    </i>:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <select name="manufacturer_id" id="" class="select2 form-control">
                                            <option value=""> Select Product </option>
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
                                <label for="image" class="col-md-2 text-right col-form-label">Medicine
                                    Details:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <input type="text" name="manufacturer_price" class="form-control"
                                            id="manufacturer_price" placeholder="Price"
                                            value="{{ old('manufacturer_price') }}">
                                    </div>
                                    @error('manufacturer_price')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="tax" class="col-sm-4 col-form-label text-right">Vat <i
                                                class="text-danger"></i>:</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="tax0" class="form-control" value="1.00">
                                        </div>
                                        <div class="col-sm-1"> <i class="text-success">%</i></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="tax" class="col-sm-4 col-form-label text-right">IGTA <i
                                                class="text-danger"></i>:</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="tax1" class="form-control" value="1.00">
                                        </div>
                                        <div class="col-sm-1"> <i class="text-success">%</i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-md-2 text-right col-form-label">Status <i
                                        class="text-danger"> * </i>:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <label class="radio-inline my-2">
                                            <input type="radio" name="status" value="1" checked="checked" id="status">
                                            Active
                                        </label>
                                        <label class="radio-inline my-2">
                                            <input type="radio" name="status" value="0" id="status">
                                            Inactive
                                        </label>
                                    </div>
                                    @error('status')
                                    <div class="alert text-danger m-b-0">
                                        <span>{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <label for="preview" class="col-md-2 text-right col-form-label">Preview:</label>
                                <div class="col-md-4">
                                    <div class="">
                                        <img id="blah" class="img-thambnail"
                                            src="https://pharmacyv5.bdtask.com/pharmacare-9.4_demo/assets/dist/img/products/product.png"
                                            alt="your image" height="70px" width="70px;">
                                    </div>
                                </div>
                            </div>
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
                                <a href="https://pharmacyv5.bdtask.com/pharmacare-9.4_demo/assets/csvfile/manufacturer_csv_sample.csv"
                                    class="btn btn-info pull-right"><i class="fa fa-download"></i> Download Sample
                                    File</a>
                            </div>
                            <form
                                action="https://pharmacyv5.bdtask.com/pharmacare-9.4_demo/manufacturer/upload_manufacturer"
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
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
</script>
@endsection
