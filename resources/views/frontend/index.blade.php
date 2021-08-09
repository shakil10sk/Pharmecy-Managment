@extends('frontend.dashboard.master')

@section('title')
GLOBAL PHARMA
@endsection


@section('title-section')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Welcome {{Auth::user()->name}}!</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">GLOBAL PHRMA</a></li>
                <li class="active">{{Auth::user()->name}} Dashboard</li>
            </ol>
        </div>
    </div>
@endsection

@section('content-section')

    <!-- Start Widget -->
    @include('frontend.dashboard.partials.widget')
    <!-- End row-->

    {{-- website status section  --}}
     @include('frontend.dashboard.partials.webstatus')
@endsection

