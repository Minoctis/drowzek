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
            @yield('nav')
            <div class="container">
                
            </div>

            @yield('content')
            
            
            @yield('footer')
        </div>
    </body>
</html>