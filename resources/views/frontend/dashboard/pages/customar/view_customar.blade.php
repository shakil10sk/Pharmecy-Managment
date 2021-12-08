@extends('frontend.dashboard.master') @section('title') GLOBAL PHARMA
@endsection @section('content-section')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title">Customar View</h4>
        <ol class="breadcrumb pull-right">
            <li>
                <a href="#">GLOBAL</a>
            </li>
            <li>
                <a href="#">Customar</a>
            </li>
            <li class="active">Customar Table</li>
        </ol>
    </div>
</div>

<div class="panel">

    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="m-b-30">
                    <button
                        id="addToTable"
                        onclick="window.location.href='{{ url('/customar/add') }}'"
                        class="btn btn-primary waves-effect text-light waves-light">Add
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
        @include('message.alert')
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="datatable-editable">
                <thead>
                    <tr>
                        <th>S.I</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Photo</th>
                        <th>Address</th>
                        <th>Account Number</th>
                        <th>Bank Name</th>
                        <th>Bank Branch Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customar as $key => $value)
                    <tr class="gradeX">
                        <td>{{ ++$key }}</td>
                        <td>{{ $value->customar_name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->phone }}</td>
                        <td>{{ $value->custoamr_city }}</td>
                        <td><img src="{{ asset('public/images/customar/'.$value->photo) }}" alt="" width="50" height="50"></td>
                        <td>{{ $value->address }}</td>
                        <td>{{ $value->ac_num }}</td>
                        <td>{{ $value->bank_name }}</td>
                        <td>{{ $value->bank_branch }}</td>
                        <td class="actions">
                            {{-- <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a> --}}
                            {{-- <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a> --}}
<<<<<<< HEAD
                            <a href="{{ url('/customar/'.$value->id.'/edit') }}" class="on-default edit-row">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="{{ url('/customar/'.$value->id.'/delete') }}" class="on-default remove-row">
=======
                            <a href="{{ asset('/customar/edit/ '.$value->id) }}" class="on-default edit-row">
                                <i class="fa fa-pencil"></i>
                            </a> | 
                            <a href="{{ asset('/customar/delete/ '.$value->id) }}" class="on-default remove-row">
>>>>>>> DemoPharmecy
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="col-md-12 text-right">
            {{ $customar->links() }}
        </div>
    </div>
    <!-- end: page -->

</div>
<!-- end Panel -->

@endsection
