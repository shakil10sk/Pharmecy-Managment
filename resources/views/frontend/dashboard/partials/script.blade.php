        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/waves.js')}}"></script>
        <script src="{{asset('public/frontend/js/wow.min.js')}}"></script>
        <script src="{{asset('public/frontend/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/frontend/js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{asset('public/frontend/assets/chat/moment-2.2.1.js')}}"></script>
        <script src="{{asset('public/frontend/assets/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
        <script src="{{asset('public/frontend/assets/jquery-detectmobile/detect.js')}}"></script>
        <script src="{{asset('public/frontend/assets/fastclick/fastclick.js')}}"></script>
        <script src="{{asset('public/frontend/assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('public/frontend/assets/jquery-blockui/jquery.blockUI.js')}}"></script>

        <!-- sweet alerts -->
        <script src="{{asset('public/frontend/assets/sweet-alert/sweet-alert.min.js')}}"></script>
        <script src="{{asset('public/frontend/assets/sweet-alert/sweet-alert.init.js')}}"></script>

        <!-- flot Chart -->
        <script src="{{asset('public/frontend/assets/flot-chart/jquery.flot.js')}}"></script>
        <script src="{{asset('public/frontend/assets/flot-chart/jquery.flot.time.js')}}"></script>
        <script src="{{asset('public/frontend/assets/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('public/frontend/assets/flot-chart/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('public/frontend/assets/flot-chart/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('public/frontend/assets/flot-chart/jquery.flot.selection.js')}}"></script>
        <script src="{{asset('public/frontend/assets/flot-chart/jquery.flot.stack.js')}}"></script>
        <script src="{{asset('public/frontend/assets/flot-chart/jquery.flot.crosshair.js')}}"></script>

        <!-- Counter-up -->
        <script src="{{asset('public/frontend/assets/counterup/waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/frontend/assets/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>

        <!-- CUSTOM JS -->
        <script src="{{asset('public/frontend/js/jquery.app.js')}}"></script>
        <script src="{{ asset('public/frontend/assets/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('public/frontend/assets/datatables/dataTables.bootstrap.js') }}"></script>


        <!--Form Validation-->
         <script src="{{asset('public/frontend/assets/form-wizard/bootstrap-validator.min.js')}}" type="text/javascript"></script>

          <!--Form Wizard-->
        <script src="{{ asset('public/frontend/assets/form-wizard/jquery.steps.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('public/frontend/assets/jquery.validate/jquery.validate.min.js') }}"></script>

         <!--wizard initialization-->
         <script src="{{ asset('public/assets/form-wizard/wizard-init.js')}}" type="text/javascript"></script>

        <!-- Dashboard -->
        <script src="{{asset('public/frontend/js/jquery.dashboard.js')}}"></script>

        <!-- Chat -->
        <script src="{{asset('public/frontend/js/jquery.chat.js')}}"></script>

        <!-- Todo -->
        <script src="{{asset('public/frontend/js/jquery.todo.js')}}"></script>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>



        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>

<script>
    $('document').ready(function(){
        $('#datatable').datatable()
    });

    </script>


<script>
function error(){


    swal("Only Admin Can Do IT !", "Please Contact With Admin!");
}

</script>
