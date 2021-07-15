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
                   <h3 class="text-center m-t-10 text-white"> Login With Dashboard </h3>
                </div> 
                {{-- error messages --}}
                @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                  <p>{{ $message }}</p>
                </div>
                @endif

                <div class="panel-body">
                <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg"  placeholder="Email" name="email" id="email" value="{{ old('email') }}">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group" id="show_hide_password">
                                <input class="form-control input-lg" type="password" name="password" id="password" placeholder="Password" value="{{ old('password') }}">
                                <div class="input-group-addon">
                                  <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                              </div>
                        </div>
                        <span class="text-danger">
                            @error('password')
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
                            <button class="btn btn-primary waves-effect waves-light btn-lg w-lg" type="submit">Login</button>
                        </div>
                    </div>
                    <div class="form-group m-t-30">
                        <div class="col-sm-12 text-center">
                            <a href="{{ route('register') }}">Create A new account </a>
                        </div>
                    </div>
                </form> 
                <table id="table" class="table table-hover table-bordered table-responsive" style="cursor: pointer;font-size:15px;">
                    <thead class="">
                        <tr>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Role</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">admin@gmail.com</td>
                                <td>123456</td>
                                <td>Admin</td>
                            </tr>
                            <tr>
                                <td scope="row">user@gmail.com</td>
                                <td>123456</td>
                                <td>User</td>
                            </tr>
                            
                        </tbody>
                </table>
                </div>                                 
                
            </div>
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
        <script>
            // Show Password 
            $(document).ready(function() {
                $("#show_hide_password a").on('click', function(event) {
                    event.preventDefault();
                    if($('#show_hide_password input').attr("type") == "text"){
                        $('#show_hide_password input').attr('type', 'password');
                        $('#show_hide_password i').addClass( "fa-eye-slash" );
                        $('#show_hide_password i').removeClass( "fa-eye" );
                    }else if($('#show_hide_password input').attr("type") == "password"){
                        $('#show_hide_password input').attr('type', 'text');
                        $('#show_hide_password i').removeClass( "fa-eye-slash" );
                        $('#show_hide_password i').addClass( "fa-eye" );
                    }
                });
            });
            // $(documetn).ready(function(){
            //     var table 
            // })
            var table = document.getElementById('table'),rIndex ;
            for(var i = 0 ; i< table.rows.length ; i++ ){
                table.rows[i].onclick = function(){
                    rIndex = this.rowIndex ;
                    document.getElementById("email").value = this.cells[0].innerHTML;
                    document.getElementById("password").value = this.cells[1].innerHTML;
                }
            }
        </script>
	
	</body>
</html>
