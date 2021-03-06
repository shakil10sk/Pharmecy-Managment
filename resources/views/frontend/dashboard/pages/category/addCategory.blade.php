@extends('frontend.dashboard.master')

@section('title')
ADD Category
@endsection


@section('content-section')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="panel panel-success">
            <div class="panel-heading"><h3 class="panel-title text-white">Add Category <a href="{{ url('/category/') }}" class="pull-right btn btn-danger btn-sm">View Category</a></h3></div>

            {{-- @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @include('message.alert') --}}
            <div class="panel-body">
                <form action="{{ route('store.category') }}" role="form" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if(Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    @if(Session::get('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                    @endif

                {{-- @include('message.alert') --}}

                    <div class="form-group">
                        <div class="form-group">
                            <label for="cat">Add Category :</label>
                            <input type="text" name="category" id="cat" placeholder="Add Category" required>
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect eaves-light">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

