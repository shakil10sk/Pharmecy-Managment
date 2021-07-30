@extends('frontend.dashboard.master')

@section('title')
GLOBAL PHARMA
@endsection


@section('title-section')
    <div class="row">
        <div class="col-sm-12 bg-success">
            <h4 class="pull-left page-title"><span class="text-uppercase">{{ Auth::user()->name }}'s Profile!</span> </h4>
            <ol class="breadcrumb pull-right">
                <li><a href="/home" class="btn btn-info">GLOBAL PHRMA</a></li>

            </ol>
        </div>
    </div>
@endsection

@section('content-section')
<br>
<br>
<br>

<table class="table table-responsive-md">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Photo</th>
        <th>NID Number</th>
        <th>City</th>
        <th>Position</th>
        <th>joining Date</th>
    </tr>
    <tr>
        <td>{{ Auth::user()->name }}</td>
        <td>{{ Auth::user()->email }}</td>
        <td>{{ Auth::user()->phone }}</td>
        <td>{{ Auth::user()->address }}</td>
        <td><img src="{{ asset('images/users/'. Auth::user()->photo) }}" alt="" width="50" height="50"></td>

        {{-- <td>{{ Auth::user()->photo }}</td> --}}
        <td>{{ Auth::user()->nid_number }}</td>
        <td>{{ Auth::user()->city }}</td>
        <td>{{ Auth::user()->position }}</td>
        <td>{{ Auth::user()->created_at }}</td>

    </tr>
</table>

@endsection

