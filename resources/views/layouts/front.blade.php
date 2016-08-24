<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Hôm de goût - @yield('title')</title>
        <meta name="description" content="Hôm de goût, Philippe Drowzek, designer de meubles avant-gardistes, vente d'accessoires complémentaires." />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- CSS -->
        <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/bootstrap/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" >
<!--        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >-->
        <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/global.css') }}" rel="stylesheet" type="text/css" >




        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        
        <!-- JavaScript -->
        <script src="{{ asset('js/jquery-1.12.0.min.js') }}"></script>
        <script src=" {{ asset('js/bootstrap.min.js') }}" ></script>
        <script type="text/javascript" src=" {{ asset('js/toastr.min.js') }} "></script>


    </head>
    
    <body data-spy="scroll" data-target=".navbar" data-offset="50">
        <div class="homepage">
            @include('elements.nav')
            <div class="homepage-content">
                
                @yield('content')
                
                @include('elements.engagement')

                @include('elements.social-links')
                
                @include('elements.footer')
                          
            </div>


        </div>
        
        <script type="text/javascript" src=" {{ asset('js/main.js') }} "></script>
    </body>
</html>