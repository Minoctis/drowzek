<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home de goût - @yield('title')</title>

        <!-- CSS -->
        <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
        
        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        
        <!-- JavaScript -->
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src=" {{ asset('js/bootstrap.min.js') }} "></script>
        
        
    </head>
    
    <body>
        <div class="homepage">
            @yield('nav')
            <div class="homepage-content">
            
                @yield('content')

                @yield('engagement')

                @yield('footer')  
                          
            </div>


        </div>
    </body>
</html>