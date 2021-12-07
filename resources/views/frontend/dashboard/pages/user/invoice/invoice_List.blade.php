@extends('frontend.dashboard.master')

@section('title')
GLOBAL PHARMA
@endsection

@section('content-section')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title">View Emplyoee</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="{{ url('/') }}">GLOBAL PHARMA</a></li>
            <li><a href="{{ url('/employee/add') }}">emplyoee</a></li>
            <li class="active">Emplyoee Table</li>
        </ol>
    </div>
</div>


<div class="panel">

    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="m-b-30">
                    <button id="addToTable" onclick="window.location.href='/employee/add'"
                        class="btn btn-primary waves-effect text-light waves-light">Add
                        <i class="fa fa-plus"></i></button>
                </div>
            </div>
        </div>
        @include('message.alert')
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="datatable-editable">
                <thead>
                    <tr>
                        <th>S.I</th>
                        <th>Customar Name</th>
                        <th>Total Products</th>
                        <th>sub total</th>
                        <th>vat</th>
                        <th>Total</th>
                        <th>pay</th>
                        <th>due</th>
                        <th>order id</th>
                        <th>product</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employee as $key => $value)
                        <tr class="gradeX">
                            <td>{{ ++$key }}</td>
                            <td>{{ $value->firstname }}</td>
                            <td>{{ $value->lastname }}</td>
                            <td>{{ $value->username }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->phone }}</td>
                            <td>{{ $value->address }}</td>
                            <td>{{ $value->experience }}</td>
                            <td>{{ $value->experience }}</td>
                            <td>{{ $value->salary }}</td>

                            <td class="actions">
                                {{-- <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a> --}}
                                {{-- <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a> --}}
                                <a href="{{ url('/employee/edit/'.$value->id) }}" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                <a href="{{ url('/employee/delete/'.$value->id) }}" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
       {{-- <div class="col-md-12 text-right">
        {{ $employee->links() }}
       </div> --}}
    </div>
    <!-- end: page -->

</div> <!-- end Panel -->

@endsection
