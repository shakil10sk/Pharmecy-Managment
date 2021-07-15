<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>Moltran - Responsive Admin Dashboard Template</title>

       @include('frontend.dashboard.partials.styles')
       @yield('error-style')
        
    </head>
    <body>


        @yield('error-content')

        
        @include('frontend.dashboard.partials.scripts')
        @yield('error-script')
	
	</body>
</html>