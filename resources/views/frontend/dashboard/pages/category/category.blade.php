@extends('frontend.dashboard.master')

@section('title')
GLOBAL PHARMA
@endsection

@section('content-section')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title">Category Table</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">GLOBAL</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Category Table</li>
        </ol>
    </div>
</div>


<div class="panel">

    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="m-b-30">
                    <button id="addToTable" onclick="window.location.href='/add/category'"
                        class="btn btn-primary waves-effect text-light waves-light">Add
                        <i class="fa fa-plus"></i></button>
                </div>
            </div>
        </div>
        @include('message.alert')
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="datatable-GLOBAL">
                <thead>
                    <tr>
                        <th>S.I</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $key => $value)
                        <tr class="gradeX">
                            <td>{{ ++$key }}</td>
                            <td>{{ $value->category }}</td>
                            <td class="actions">
                                {{-- <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a> --}}
                                {{-- <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a> --}}
                                <a href="/category" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                <a href="/category" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
       <div class="col-md-12 text-right">
        {{-- {{ $category->links() }} --}}
       </div>
    </div>
    <!-- end: page -->

</div> <!-- end Panel -->

@endsection
