<div class="row">
    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
            <div class="mini-stat-info text-right text-muted">
                <span class="counter">
                    @php
                        $table=DB::table('orders')->get();
                        $count=1;
                        foreach ($table as $user) {
                            $count=$count = $user->id;
                        }
                        echo $count;
                    @endphp
                </span>
                Total Sales
            </div>
            <div class="tiles-progress">
                <div class="m-t-20">
                    <h5 class="text-uppercase">Total Sales
                        <span class="pull-right">
                            @php
                                $target=500;
                                $percent=($count/$target)*100;
                                // echo $percent."%";
                            @endphp
                        </span>
                    </h5>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                            <span class="sr-only"> 60% complete" </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- Total Customar Section --}}
<div class="col-md-6 col-sm-6 col-lg-3">
    <div class="mini-stat clearfix bx-shadow">
        <span class="mini-stat-icon bg-info"><i class="fa fa-user" aria-hidden="true"></i></span>
        <div class="mini-stat-info text-right text-muted">
            <span class="counter">
                @php
                    $table=DB::table('customars')->get();
                    $count=0;
                    foreach ($table as $user) {
                        $user->customar_name;
                        $count++;
                    }
                    echo $count;
                @endphp
            </span>
            Total Customar
        </div>
        <div class="tiles-progress">
            <div class="m-t-20">
                <h5 class="text-uppercase">Total Customar
                    <span class="pull-right">
                        {{-- @php
                            $target=500;
                            $percent=($count/$target)*100;
                            // echo $percent."%";
                        @endphp --}}
                    </span>
                </h5>
                <div class="progress progress-sm m-0">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                        <span class="sr-only"> 60% complete" </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End totaL CUSTOMAR section --}}

    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-info"><i class="ion-ios7-cart"></i></span>
            <div class="mini-stat-info text-right text-muted">
                <span class="counter">
                    {{ count($today_sells) }}
                </span>
                Todays Sales
                {{-- <span class="counter">0</span> --}}
            </div>
            <div class="tiles-progress">
                <div class="m-t-20">
                    <h5 class="text-uppercase">Todays Sales
                        <span class="pull-right">
                        </span>
                    </h5>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                            <span class="sr-only"> 60% complete" </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
            <div class="mini-stat-info text-right text-muted">

                <span class="counter">
                    @php
                        $table=DB::table('users')->get();
                        $count=0;
                        foreach ($table as $user) {
                            $user->name;
                            $count++;
                        }
                        echo $count;
                    @endphp
                </span>
                Total Users
            </div>
            <div class="tiles-progress">
                <div class="m-t-20">
                    <h5 class="text-uppercase">Total Users
                         {{-- <span class="pull-right">57%</span> --}}
                    </h5>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%;">
                            <span class="sr-only">57% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-purple"><i class="ion-ios7-cart"></i></span>
            <div class="mini-stat-info text-right text-muted">
                <span class="counter">956</span>
                New Orders
            </div>
            <div class="tiles-progress">
                <div class="m-t-20">
                    <h5 class="text-uppercase">Orders <span class="pull-right">90%</span></h5>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar progress-bar-purple" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                            <span class="sr-only">90% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <span class="mini-stat-icon bg-success"><i class="ion-eye"></i></span>
            <div class="mini-stat-info text-right text-muted">
                <span class="counter">20544</span>
                Unique Visitors
            </div>
            <div class="tiles-progress">
                <div class="m-t-20">
                    <h5 class="text-uppercase">Visitors <span class="pull-right">60%</span></h5>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                            <span class="sr-only">60% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


</div>
