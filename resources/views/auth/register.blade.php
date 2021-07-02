<<<<<<< HEAD
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>Moltran - Responsive Admin Dashboard Template</title>

        <!-- Base Css Files -->
        <link href="{{ asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="{{ asset('frontend/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('frontend/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('frontend/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

        <!-- animate css -->
        <link href="{{ asset('frontend/css/animate.css')}}" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{ asset('frontend/css/waves-effect.css')}}" rel="stylesheet">

        <!-- Custom Files -->
        <link href="{{ asset('frontend/css/helper.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/css/style.css')}}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="{{ asset('frontend/js/modernizr.min.js')}}"></script>
        
    </head>
    <body>


        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                   <h3 class="text-center m-t-10 text-white"> Create a new Account </h3>
                </div> 


                <div class="panel-body">
                <form class="form-horizontal m-t-20" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="text"  placeholder="Username" name="name" value="{{ old('name') }}">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg"  placeholder="Email" name="email" value="{{ old('email') }}">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="password" name="password"  placeholder="Password" value="{{ old('password') }}" >
                        </div>
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="password" name="password_confirmation"  placeholder=" confirm Password" value="{{ old('password_confirmation') }}" >
                        </div>
                        <span class="text-danger">
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox" checked="">
                                <label for="checkbox-signup">
                                    I accept <a href="#">Terms and Conditions</a>
                                </label>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary waves-effect waves-light btn-lg w-lg" type="submit">Register</button>
                        </div>
                    </div>

                    <div class="form-group m-t-30">
                        <div class="col-sm-12 text-center">
                            <a href="{{ route('login') }}">Already have account?</a>
                        </div>
                    </div>
                </form> 
                </div>                                 
                
            </div>
            {{-- Login Table  --}}
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Sl</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row"></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
            </table>
        </div>


        
    	<script>
            var resizefunc = [];
        </script>
        <script src="{{ asset('frontend/js/jquery.min.js')}}"></script>
        <script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('frontend/js/waves.js')}}"></script>
        <script src="{{ asset('frontend/js/wow.min.js')}}"></script>
        <script src="{{ asset('frontend/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
        <script src="{{ asset('frontend/js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/jquery-detectmobile/detect.js')}}"></script>
        <script src="{{ asset('frontend/assets/fastclick/fastclick.js')}}"></script>
        <script src="{{ asset('frontend/assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
        <script src="{{ asset('frontend/assets/jquery-blockui/jquery.blockUI.js')}}"></script>


        <!-- CUSTOM JS -->
        <script src="{{ asset('frontend/js/jquery.app.js')}}"></script>
	
	</body>
</html>
=======
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
>>>>>>> main
