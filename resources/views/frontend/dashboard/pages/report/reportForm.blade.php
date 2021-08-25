@extends('frontend.dashboard.master')

@section('title')
GLOBAL PHARMA
@endsection

@section('content-section')

<div>
    <form action="{{ asset('/report') }}" method="post">
        @csrf
        <input type="date" name="from_date">
        <input type="date" name="to_date">

        <button type="submit" class="btn btn-success" value="Submit">Submit</button>
    </form>
</div>


@endsection

