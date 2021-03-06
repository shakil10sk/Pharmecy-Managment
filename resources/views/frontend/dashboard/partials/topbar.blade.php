<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center d-inline-block">
            <a href="{{ route('admin.dashboard') }}" class="logo ">
                <img class="myimage img-fluid" src="{{ asset('public/frontend/images/Global_Pharma.png') }}" alt="Global Pharma">
            </a>
            {{-- <a href="/" class="logo "><img class="myimage" src="{{ asset('frontend/images/logo.PNG') }}" alt="Global"  ></span></a>
            <a href="index.html" class="logo"><i class="md md-terrain"></i> <span>abc </span></a> --}}
        </div>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button class="button-menu-mobile open-left">
                        <i class="fa fa-bars"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>
                <form class="navbar-form pull-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                    </div>
                    <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                </form>

                <ul class="nav navbar-nav navbar-right pull-right">


                    @include('frontend.dashboard.partials.notification')


                    <li class="hidden-xs">
                        <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                    </li>
                    {{-- <li class="hidden-xs">
                        <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                    </li> --}}
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{asset('/images/users/'.Auth::User()->photo)}}" alt="user-img" class="img-circle"> </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('user.profile') }}"><i class="md md-face-unlock"></i> Profile</a></li>
                            {{-- <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li> --}}
                            {{-- <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                            <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li> --}}
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <i class="md md-settings-power"></i>
                                    Logout</a>

                                    {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a> --}}

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    {{-- </div> --}}</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
