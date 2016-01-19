<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home de goût - @yield('title')</title>

        <!-- CSS And JavaScript -->
        <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
        
    </head>
    
    <body>
        <div class="homepage">
            <div class="container">
                <nav class="navbar navbar-inverse navbar-fixed-top">
                    <!-- Navbar Contents -->
                    test
                </nav>
            </div>

            @yield('content')
        </div>
    </body>
</html>