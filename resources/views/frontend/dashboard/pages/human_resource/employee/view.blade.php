@extends('frontend.dashboard.master')

@section('title')
GLOBAL PHARMA
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
                    <a href="{{ route('employee.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add Bank </a>
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
                                    <th>Name</th>
                                    <th>Designation Name </th>
                                    <th>Phone Number </th>
                                    <th>Email  </th>
                                    <th>Blood Group  </th>
                                    <th>Houre /Salary Rate  </th>
                                    <th>Country  </th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                     
                            <tbody>
                               
                                @foreach($employee as $key => $value)
                               
                                <tr>
                                    <td>{{ ++$key }} </td>
                                    <td>{{ $value->first_name }} {{ $value->last_name }}  </td>
                                    <td>{{ $value->designation_id }}</td>
                                    <td>{{ $value->phone }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->blood }}</td>
                                    <td>{{ $value->salary_type }}</td>
                                    <td>{{ $value->salary_value}}</td>
                                    <td>
                                        @php 
                                        $randPic = $value->image ;
                                        $firstLatter = substr($randPic,0,4);
                                        // echo $firstLatter ;
                                        @endphp 
                                        @if ($firstLatter == "http")
                                        <img style="width:70px ;height:60px ;" src="{{ $value->image }}" alt="">
                                        @elseif($firstLatter == "")
                                        <img style="width:70px ;height:60px ;" src="{{ asset('images/employee.jpg') }}" alt="">
                                        @else
                                        <img style="width:70px ;height:60px ;" src="{{ asset('images/employee/'.$value->image) }}" alt="">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('employee.edit',$value->id) }}"><i class="fa fa-edit"></i></a> &nbsp; &nbsp; 
                                        <a onclick="event.preventDefault();document.getElementById('delete-form').submit();" href="{{ route('employee.destroy',$value->id) }}" class="text-danger"><i class="fa fa-trash"></i></a> &nbsp; &nbsp; 
                                        <form id="delete-form" action="{{ route('employee.destroy',$value->id) }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                             </a> --}}

                            
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
    <!-- CUSTOM JS -->
    {{-- <script src="{{ asset('frontend/js/jquery.app.js') }}"></script> --}}

    <script src="{{ asset('frontend/assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/datatables/dataTables.bootstrap.js') }}"></script>


    <script type="text/javascript">
       $(document).ready(function () {
        $('#datatable').dataTable( {
            "scrollX": true
        } );
    });
    </script>
@endsection