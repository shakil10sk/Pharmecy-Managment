@extends('frontend.dashboard.master')

@section('title')
ADD Medicine
@endsection


@section('content-section')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="panel panel-info">
            <div class="panel-heading"><h3 class="panel-titile text-white">Products Import <a href="{{url('/export')}}" class="pull-right btn btn-danger btn-sm">Dowenload Xlsx</a></h3></div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="panel-body">
                <form action="{{ route('import') }}" role="form" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <div class="form-group">
                            <label for="files">Xlsx File Import</label>
                            <input type="file" name="import_file" required>
                        </div>
                        <button type="submit" class="btn btn-success waves-effect eaves-light">Uploads</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

