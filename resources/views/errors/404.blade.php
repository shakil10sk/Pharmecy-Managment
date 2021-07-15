@extends('errors.errors_layout')

@section('error-title')
    404 - Page Not Found 
@endsection
@section('error-content')
<div class="wrapper-page">
   <div class="ex-page-content text-center">
       <h1>404!</h1>
       <h2>Sorry, page not found</h2><br>
       <p>You better try our awesome search:</p>
       <div class="row">
           <div class="input-group">
               <input type="text" class="form-control input-lg">
               <span class="input-group-btn">
                   <button class="btn btn-primary waves-effect waves-light btn-lg" type="button">Search</button>
                 </span>
           </div>
       </div><br>
       <a class="btn btn-purple waves-effect waves-light" href="index.html"><i class="fa fa-angle-left"></i> Back to Dashboard</a>
   </div>
</div>
@endsection