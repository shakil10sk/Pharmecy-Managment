<li class="dropdown hidden-xs">
    <a href="{{route('notifiaction')}}" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
        <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">           
            @php
                $stock=DB::table('medicines')->select('*')->where('qty','<',50)->get();
                $count=0;
                foreach ($stock as $user) {
                    $user->qty;
                    $count++;
                }
                echo $count;
            @endphp           
    </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-lg">
        <li class="text-center notifi-title">Notification</li>
        <li class="list-group">
           <!-- list item-->

           @php
            $stock=DB::table('medicines')->select('*')->where('qty','<',50)->get();           
            foreach ($stock as $data) {   
                
           echo '<a href="javascript:void(0);"  class="list-group-item">';
            echo '<div class="media">';
                echo '<div class="pull-left"><em onclick="error();" class="fa fa-user-plus fa-2x text-info"></em> </div>';
                    
                
                echo '<div class="media-body clearfix">';
                                   
                       
                    echo "<div class='media-heading'>".$data->medicine_name."</div>";
                    echo "<p class='m-0'>";
                    echo "<small>You have ".$data->qty." pcs Medicines </small></p>";
                    echo "<br>";
                    
                
                 echo "</div> </div> </a>";
             
          
        }
                        @endphp
           {{-- <!-- list item-->
            <a href="javascript:void(0);" class="list-group-item">
              <div class="media">
                 <div class="pull-left">
                    <em class="fa fa-diamond fa-2x text-primary"></em>
                 </div>
                 <div class="media-body clearfix">
                    <div class="media-heading">New settings</div>
                    <p class="m-0">
                       <small>There are new settings available</small>
                    </p>
                 </div>
              </div>
            </a>
            <!-- list item-->
            <a href="javascript:void(0);" class="list-group-item">
              <div class="media">
                 <div class="pull-left">
                    <em class="fa fa-bell-o fa-2x text-danger"></em>
                 </div>
                 <div class="media-body clearfix">
                    <div class="media-heading">Updates</div>
                    <p class="m-0">
                       <small>There are
                          <span class="text-primary">2</span> new updates available</small>
                    </p>
                 </div>
              </div>
            </a>
           <!-- last list item -->
            <a href="javascript:void(0);" class="list-group-item">
              <small>See all notifications</small>
            </a> --}}
        </li>
    </ul>
</li>
