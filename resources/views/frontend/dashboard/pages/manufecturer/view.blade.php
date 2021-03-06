@extends('frontend.dashboard.master')

@section('title')
GLOBAL PHARMA
@endsection

@section('content-section')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title">Manufacturer Table</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">GLOBAL Pharma</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Manufacturer Table</li>
        </ol>
    </div>
</div>


<div class="panel">

    <div class="panel-body">
        <!-- <div class="row">
            <div class="col-sm-6">
                <div class="m-b-30">
                    <button id="addToTable" onclick="window.location.href='{{ url('/employee/add') }}'"
                        class="btn btn-primary waves-effect text-light waves-light">Add
                        <i class="fa fa-plus"></i></button>
                </div>
            </div>
        </div> -->
        @include('message.alert')
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="datatable-Manufecturer">
                <thead>
                    <tr>
                        <th>S.I</th>
                        <th>Manufacturer</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($manufacturer as $key => $value)
                        <tr class="gradeX">
                            <td>{{ ++$key }}</td>
                            <td>{{ $value->manufecture }}</td>
                           
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
