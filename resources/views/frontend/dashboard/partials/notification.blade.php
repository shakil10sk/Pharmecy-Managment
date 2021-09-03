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
                echo '<div class="media" onclick="error();">';
                echo '<div class="pull-left"><em  class="fa fa-user-plus fa-2x text-info"></em> </div>';
                    
                echo '<div class="media-body clearfix">';                                   
                       
                echo "<div class='media-heading'>".$data->medicine_name."</div>";
                echo "<p class='m-0'>";
                echo "<small>You have Only ".$data->qty." pcs Medicine </small></p>";
                echo "<br>";                    
                
                echo "</div> </div> </a>";             
          
            }
        @endphp
          
        </li>
    </ul>
</li>
