@extends('frontend.dashboard.master')

@section('title')
Designation View 
@endsection

@section('style')
<!-- DataTables -->
<link href="{{ asset('frontend/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
<div class="container">
    <div class="">
        <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Datatable</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Moltran</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Datatable</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading row col-12">
                    <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6">
                        <h3 class="panel-title">Datatable</h3>
                    </div>
                    <div class="col-md-6 text-right text-md-left">
                        <a href="{{ route('designation.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp;Add Designation
                        </a>
                    </div>


                </div>
                <div class="panel-body">
                    @include('message.success')
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl No </th>
                                        <th>Designation Name</th>
                                        <th>Details </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach($designation as $key => $value)
                                    <tr>
                                        <td>{{ ++$key }} </td>
                                        <td>{{ $value->name }} </td>
                                        <td>{!! substr($value->details, 0 , 15  ) !!} ...</td>
                                        <td>
                                            <a href="{{ route('designation.edit',$value->id) }}"><i
                                                    class="fa fa-edit"></i></a> &nbsp; &nbsp;
                                            <a onclick="event.preventDefault();document.getElementById('delete-form').submit();"
                                                href="{{ route('designation.destroy',$value->id) }}"
                                                class="text-danger"><i class="fa fa-trash"></i></a> &nbsp; &nbsp;
                                            <form id="delete-form"
                                                action="{{ route('designation.destroy',$value->id) }}"
                                                method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach



                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- End Row -->
    </div>
</div>
@endsection


@section('script')
<!-- CUSTOM JS -->
{{-- <script src="{{ asset('frontend/js/jquery.app.js') }}"></script> --}}

<script src="{{ asset('frontend/assets/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('frontend/assets/datatables/dataTables.bootstrap.js') }}"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').dataTable({
            "scrollX": true
        });
    });

</script>
@endsection
