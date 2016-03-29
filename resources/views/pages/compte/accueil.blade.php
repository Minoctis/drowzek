@extends('layouts.default')

@section('title', 'Mon compte - Home de goût')

@section('content')

<div class="moncompte">
	<div class="entete-page">
		<img src="http://placehold.it/1200x200" class="img img-reponsive" alt="Mon Compte">
		<h1 class="page-title">Mon compte</h1>
	</div>
	<div class="container">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<p>Bonjour, <span>Lorem ipsum</span> </p>
			<a href="#" class="logout"><i class="fa fa-sign-out"></i> Se déconnecter</a>

			<ul class="nav nav-tabs mon-compte-nav">
			  <li class="active"><a data-toggle="tab" href="#accueil">Accueil de mon compte</a></li>
			  <li><a data-toggle="tab" href="#commandes">Mes commandes</a></li>
			  <li><a data-toggle="tab" href="#infos-commande">Information de commande</a></li>
			  <li><a data-toggle="tab" href="#adresses">Mes adresses</a></li>
			  <li><a data-toggle="tab" href="#favorites">Mes produits enregistrés</a></li>
			  <li><a data-toggle="tab" href="#infos">Mes informations personnelles</a></li>
			</ul>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<div class="tab-content">

				<!-- ACCUEIL DE MON COMPTE -->

				<div id="accueil" class="tab-pane fade in active">
				    <h3 class="title-content-compte">Accueil de mon compte</h3>
				    <p>Mes dernières commandes :</p>
	
				    	
				    @include('elements.table-commandes')
				</div> 

				<!-- FIN ACCUEIL DE MON COMPTE -->


				<!-- MES COMMANDES -->

				<div id="commandes" class="tab-pane fade">
				    <h3 class="title-content-compte">Mes commandes</h3>
				    <p>Mon historique de commandes</p>

				    @include('elements.table-commandes')
				</div>

				<!-- FIN MES COMMANDES -->

				<!-- INFORMATIONS DE COMMANDE -->

				<div id="infos-commande" class="tab-pane fade">
				    <h3 class="title-content-compte">Commande N°LJDSJDS90</h3>
				    <p style="color:red;">Cet onglet s'affiche au clic sur une commande. L'onglet ne doit pas être visible. (texte à supprimer)</p>

				    <div class="entete-commande-infos">
				    	<p class="etat-commande">Etat : paiement validé</p>
				    	<p class="date-commande">Commande passée le 29/03/2016</p>
				    </div>
				    
				    <h4 class="sub-title-content-commande">Information de la commande :</h4>
				    <p class="facture"><a href="#">Imprimer la facture</a></p>

				    <div class="produit-commandes">
				    	<div class="row">
				    		<div class="produit col-md-3">
				    			<div class="img-content">
				    				<img src="http://placehold.it/200x200" class="img img-reponsive" alt="">
				    			</div>

				    		</div>
				    	</div>
				    </div>

				</div>

				<!-- FIN INFORMATION DE COMMANDE -->

				<!-- MES ADRESSES -->

				<div id="adresses" class="tab-pane fade">
				    <h3 class="title-content-compte">Mes adresses</h3>
				    <p></p>
				</div>

				<!-- FIN MES ADRESSES -->

				<!-- MES ARTICLES FAVORIES -->

				<div id="favorites" class="tab-pane fade">
				    <h3 class="title-content-compte">Mes articles favories</h3>
				    <p>Some content in menu 2.</p>
				</div>

				<!-- FIN MES ARTICLES FAVORIES -->

				<!-- MES INFOS PERSONNELLES -->

				<div id="infos" class="tab-pane fade">
					<h3 class="title-content-compte">Mes informations personnelles</h3>
					<p>Some content in menu 2.</p>
				</div>

				<!-- FIN MES INFOS PERSONNELLES -->

			  
			</div>
		</div>
	</div>
</div>

@endsection



