<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <link rel="shortcut icon" href="images/favicon_1.ico">
    <title>@yield('title')</title>

    @include('frontend.dashboard.partials.styles')
    @yield('style')

</head>



<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">


        {{-- Top Navigation bar  --}}
        @include('frontend.dashboard.partials.topNavigation')

        {{-- Left Sidebar  --}}

        @include('frontend.dashboard.partials.leftSidebar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">


                @yield('content')
            </div> <!-- content -->

            {{-- Footer  --}}
            @include('frontend.dashboard.partials.footer')

        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
        @include('frontend.dashboard.partials.rightSidebar')

    </div>
    <!-- END wrapper -->

    @include('frontend.dashboard.partials.scripts')
    @yield('script')

</body>

</html>
