<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home de Goût - @yield('title')</title>
        <meta name="description" content="Hôm de goût, Philippe Drowzek, designer de meubles avant-gardistes, vente d'accessoires complémentaires." />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- CSS -->
        <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" >
<!--        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >-->
        <link href="{{ asset('css/global.css') }}" rel="stylesheet" type="text/css" >
        
        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        
        <!-- JavaScript -->
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src=" {{ asset('js/bootstrap.min.js') }} "></script>
        
    </head>
    
    <body>
        <div class="page" id="@yield('page-id')">
            @include('elements.header-checkout')
            <div class="main-content">
                
                @yield('content')
                
                @include('elements.engagement')

            </div>

        </div>
        
        <script type="text/javascript" src=" {{ asset('js/main.js') }} "></script>
    </body>
</html>