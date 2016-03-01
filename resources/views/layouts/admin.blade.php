<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home de goût - ADMIN - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" type="text/css" >

    <!-- JavaScript -->
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src=" {{ asset('js/bootstrap.min.js') }} "></script>
</head>
<body>
    <div id="wrapper" class="active">

        {{-- Sidebar --}}
        <div id="sidebar-wrapper">
            <ul id="sidebar-menu" class="sidebar-nav">
                <li class="sidebar-brand"><a id="menu-toggle" href="#">Menu<span id="main-icon" class="glyphicon glyphicon-align-justify"></span></a></li>
            </ul>
            <ul class="sidebar-nav" id="sidebar">
                <li><a href="{{ route('admin::dashboard') }}">Dashboard<span class="sub-icon glyphicon glyphicon-dashboard"></span></a></li>
                <li><a href="{{ route('admin::produits::liste') }}">Produits<span class="sub-icon glyphicon glyphicon-lamp"></span></a></li>
                <li><a href="{{ route('admin::catalogue::dashboard') }}">Catalogue<span class="sub-icon glyphicon glyphicon-th"></span></a></li>
                <li><a href="{{ route('admin::clients::liste') }}">Clients<span class="sub-icon glyphicon glyphicon-user"></span></a></li>
                <li><a href="{{ route('admin::commandes::liste') }}">Commandes<span class="sub-icon glyphicon glyphicon-tasks"></span></a></li>
                <li><a href="{{ route('admin::avis::dashboard') }}">Avis<span class="sub-icon glyphicon glyphicon-comment"></span></a></li>
                <li><a href="{{ route('admin::promotions::dashboard') }}">Promotions<span class="sub-icon glyphicon glyphicon-tags"></span></a></li>
                <li><a href="{{ route('admin::pages::dashboard') }}">Pages<span class="sub-icon glyphicon glyphicon-link"></span></a></li>
                <li><a href="{{ route('admin::mailing::dashboard') }}">Mailing<span class="sub-icon glyphicon glyphicon-envelope"></span></a></li>
                <li><a href="{{ route('admin::theme::dashboard') }}">Thème<span class="sub-icon glyphicon glyphicon-tint"></span></a></li>
                <li><a href="{{ route('admin::rapports::dashboard') }}">Rapports<span class="sub-icon glyphicon glyphicon-stats"></span></a></li>
            </ul>
        </div>

        {{-- Page content --}}
        <div id="page-content-wrapper">
            <div class="page-content inset">
                {{-- Navigation --}}
                <nav class="navbar navbar-inverse" id="main-nav">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">Home de goût - Administration - @yield('title')</a>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ADMIN <span class="glyphicon glyphicon-user"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Modifier le compte</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Retour au site <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Rester connecté en tant qu'Admin</a></li>
                                    <li><a href="#">Déconnexion</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.container-fluid -->
                </nav>
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>
    <script type="text/javascript" src=" {{ asset('js/main-admin.js') }} "></script>
</body>
</html>