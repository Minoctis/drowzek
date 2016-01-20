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
    
    <body data-spy="scroll" data-target=".navbar" data-offset="50">
        <div class="homepage">
            @yield('nav')
            <div class="slider-hp">
                <img src="{{ asset('img/themes/slider/slide.png') }}" alt="">    
            </div>
            
            <div class="homepage-content">
                
                
                @yield('content')
                
                @yield('engagement')

                @yield('footer')  
                          
            </div>


        </div>
        
        <script type="text/javascript" src=" {{ asset('js/main.js') }} "></script>
    </body>
</html>