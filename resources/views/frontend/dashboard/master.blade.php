<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
<<<<<<< HEAD
        <link rel="shortcut icon" href="{{asset('public/images/favicon_1.ico')}}">
=======
        <link rel="shortcut icon" href="{{ asset('favicon.jpg') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('favicon.jpg') }}" type="image/x-icon">
>>>>>>> DemoPharmecy
        <title>@yield('title') </title>


        @include('frontend.dashboard.partials.style');




    </head>



    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
           @include('frontend.dashboard.partials.topbar')
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
           @include('frontend.dashboard.partials.sidebar')
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <!-- Page-Title -->
                        @yield('title-section')


                        @yield('content-section')


                        {{-- inbox section --}}
                        {{-- @include('frontend.dashboard.partials.inbox') --}}

                    </div> <!-- container -->

                </div> <!-- content -->

                {{-- footer section --}}
                @include('frontend.dashboard.partials.footer')


            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar chat -->
            {{-- @include('frontend.dashboard.partials.chat') --}}
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->


        @include('frontend.dashboard.partials.script')

    </body>
</html>
