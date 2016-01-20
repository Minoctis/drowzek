@section('nav')

<nav class="navbar navbar-inverse navbar-fixed-top">
    <!-- Navbar Contents -->
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        <li class="active"><a href="#">accueil<span class="sr-only">(current)</span></a></li>

        <li><a href="#">ambiance</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">cr&eacute;ation<span class="caret"></span></a>
          <ul class="dropdown-menu">
           <li class="dropdown-header"><a href="#">sejours</a></li>
            <li><a href="#">canape</a></li>
            <li><a href="#">fauteuil</a></li>
            <li><a href="#">table basse</a></li>
            <li><a href="#">Meuble tv</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header"><a href="#">Salle a manger</a></li>
            <li><a href="#">chaises, tabourets</a></li>
            <li><a href="#">bancs</a></li>
            <li><a href="#">table de repas</a></li>
            <li><a href="#">buffets, collones</a></li>
            <li><a href="#">vaisseliers</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header"><a href="#">chambre</a></li>
            <li><a href="#">Lits</a></li>
            <li><a href="#">Armoires</a></li>
          </ul>
        </li>
      </ul>
      <!--<form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>-->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-user"></i></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;Panier</a></li>
        <!--<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>-->
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


@endsection