@if ($errors->any())
@foreach ($errors->all() as $error)
    <div>{{$error}}</div>
@endforeach
@endif

@if(session()->has('success'))
<div class="alert alert-success" style="color: green;font-weight: bold;">
   {{ session()->get('success') }}
</div>
@endif
