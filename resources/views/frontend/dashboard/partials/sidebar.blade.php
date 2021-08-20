<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="{{asset('/images/users/'.Auth::User()->photo)}}" alt=""
                    class="thumb-md img-circle"></div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="md md-face-unlock"></i>
                                Profile<div class="ripple-wrapper"></div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="md md-settings"></i>
                                Settings</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="md md-lock"></i>
                                Lock screen</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
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
                                {{-- </div> --}}
                        </li>
                    </ul>
                </div>
                <p class="text-muted m-0">
                    @if(Auth::user()->role==1)
                    Adminsatrator
                    @elseif(Auth::user()->role==2)
                    Salesman(User)
                    @endif</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect ">
                        <i class="md md-home"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>

                @if(Auth::user()->role==2)
                <li>
                    <a href="/pos" class="waves-effect ">
                        <i class="md md-palette"></i>
                        <span>
                            POS
                        </span>
                    </a>
                </li>
                @endif


            @if(Auth()->user()->role==1)
                <li class="has_sub">
                    <a href="#" class="waves-effect">
                        <i class="md md-invert-colors-on"></i>
                        <span>
                            Medicine
                        </span>
                        <span class="pull-right">
                            <i class="md md-add"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="/medicine/add">Add Medicine</a>
                        </li>
                        <li>
                            <a href="/import-medicine">Import Medicine</a>
                        </li>
                        <li>
                            <a href="/medicine/view">View Medicine</a>
                        </li>
                    </ul>
                </li>
             @endif

             @if(Auth::user()->role==1)
                <li class="has_sub">
                    <a href="#" class="waves-effect">
                        <i class="md md-redeem"></i>
                        <span>
                            Employee
                        </span>
                        <span class="pull-right">
                            <i class="md md-add"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('register') }}">Create Employee</a>
                        </li>

                        <li>
                            <a href="/employee/view">View Employee</a>
                        </li>
                    </ul>
                </li>
             @endif


            @if(Auth::user()->role==1)
                <li class="has_sub">
                    <a href="#" class="waves-effect">
                        <i class="fa fa-sellsy"></i>
                        <span>
                            Customar
                        </span>
                        <span class="pull-right">
                            <i class="md md-add"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('add') }}">Add Customar</a>
                        </li>
                        <li>
                            <a href="/customar/view">View Customar</a>
                        </li>
                    </ul>
                </li>
            @elseif(Auth::user()->role==2)
                <li>
                    <a href="{{ route('add') }}" class="waves-effect">
                        <i class="fa fa-sellsy"></i>
                        <span>
                            Add New Customar
                        </span>
                    </a>
                </li>
            @endif


            @if(Auth::user()->role==1)
                <li class="has_sub">
                    <a href="#" class="waves-effect">
                        <i class="md md-invert-colors-on"></i>
                        <span>
                            category
                        </span>
                        <span class="pull-right">
                            <i class="md md-add"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled">
                        {{-- <li><a href="/create-employee">Add category</a></li> --}}
                        <li>
                            <a href="/add/category">Add category</a>
                        </li>
                        <li>
                            <a href="/category">View category</a>
                        </li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect">
                        <i class="md md-invert-colors-on"></i>
                        <span>
                            Manufacturer
                        </span>
                        <span class="pull-right">
                            <i class="md md-add"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled">
                        {{-- <li><a href="/create-employee">Manufecturer</a></li> --}}
                        <li>
                            <a href="/manufacturer ">Manufacturer
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            </ul>
            <div class="mx-auto text-center">
                <img  src="{{asset('frontend/images/Global_Pharma.gif')}}" alt="Pharmacy Photo" height="auto" width="85%" >
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<script>
    $(function() {
        $('nav a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('current');
    });
</script>
