@extends('frontend.dashboard.master')

@section('title')
    Medicine Unit List 
@endsection

@section('style')
<!-- DataTables -->
    <link href="{{ asset('frontend/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
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
                <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6"><h3 class="panel-title">Datatable</h3></div>
                <div class="col-md-6 text-right text-md-left"> 
                    <a href="{{ route('medicineType.create') }}" class="btn btn-primary">Add Medicine Type </a>
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
                                    <th>Medicine Type  Name</th>
                                    <th>Medicine Type  Status </th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                     
                            <tbody>
                                @foreach($medicineType as $key => $type)
                                <tr>
                                    <td>{{ ++$key }} </td>
                                    <td>{{ $type->type }} </td>
                                    <td> @if($type->status == 1) <span class="badge badge-success" >Active</span> @else <span class="badge badge-danger" >Inactive</span> @endif </td>
                                    <td>
                                        <a href="{{ route('medicineType.edit',$type->id) }}"><i class="fa fa-edit"></i></a> &nbsp; &nbsp; 
                                        <a onclick="event.preventDefault();document.getElementById('delete-form').submit();" href="{{ route('medicineType.destroy',$type->id) }}" class="text-danger"><i class="fa fa-trash"></i></a> &nbsp; &nbsp; 
                                        <form id="delete-form" action="{{ route('medicineType.destroy',$type->id) }}" method="POST" class="d-none">
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

@endsection

@section('script')

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