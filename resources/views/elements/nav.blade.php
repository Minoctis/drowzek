<nav class="navbar navbar-inverse navbar-fixed-top" id="nav" data-spy="affix" data-offset-top="500">
    <!-- Navbar Contents -->
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header col-sm-2">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand header-logo" href="{{ route('accueil') }}"><img style="height: 40px;" src="{{ asset('img/white-logo.svg') }}" alt="Logo Home de goût"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <!--<div class="collapse navbar-collapse col-sm-10" id="bs-example-navbar-collapse-1">-->
    <div class="col-sm-10">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <div class="col-sm-2"></div>
      <ul class="nav navbar-nav">

        <li class="active"><a href="{{ route('accueil') }}">accueil<span class="sr-only">(current)</span></a></li>

        <li><a href="{{ route('ambiances::liste') }}">ambiance</a></li>

        <li class="dropdown dropdown-large">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">cr&eacute;ation<span class="caret"></span></a>
          
          <ul class="dropdown-menu dropdown-menu-large row affix-top" data-spy="affix" data-offset-top="500">
            @foreach($categories as $categorie)
              <li class="col-sm-6 col-md-2 categorie {{ $categorie->slug }}">
                <ul>
                  <li class="dropdown-header"><a href="{{ route('creations', ['slug' => $categorie->slug]) }}">{{ $categorie->nom }}</a></li>
                  @foreach($categorie->children as $sous_categorie)
                    <li class="sous-dropdown-header"><a href="{{ route('creations', ['slug' => $sous_categorie->slug]) }}">{{ $sous_categorie->nom }}</a></li>
                  @endforeach
                </ul>
              </li>
            @endforeach
            <li class="col-sm-6 col-md-4 image-categorie hidden-xs">
              <a href="#"><img src="{{ asset('img/themes/opp-menu.jpg') }}" class="img img-reponsive" alt=""></a>
            </li>
          </ul>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('compte::accueil') }}"><i class="fa fa-user fa-lg" style='float:left'></i> <span style="padding-left: 20px;" class='visible-xs'>  Mon compte</span> </a></li>

        <li><a href="{{ route('panier') }}"><i class="fa fa-shopping-cart fa-lg"></i>  Panier</a></li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div>
  </div><!-- /.container-fluid -->
</nav>