@extends('layouts.default')

@section('title', 'Mon compte - Home de goût')

@section('page-id', 'moncompte')

@section('content')
<div class="moncompte">
	<div class="entete-page">
		<img src="http://placehold.it/1200x200" class="img img-reponsive" alt="Mon Compte">
		<h1 class="page-title">Mon compte</h1>
	</div>
	<div class="container">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<p>Bonjour, <span>{{ Auth::user()->prenom." ".Auth::user()->nom }}</span> </p>
			<a href="{{ route('deconnexion') }}" class="logout"><i class="fa fa-sign-out"></i> Se déconnecter</a>

			<ul class="nav nav-tabs mon-compte-nav">
				<li class="active"><a data-toggle="tab" href="#accueil"><i class="fa fa-home"></i> Accueil de mon compte</a></li>
				<li><a data-toggle="tab" href="#commandes">Mes commandes</a></li>
				<li><a data-toggle="tab" href="#adresses">Mes adresses</a></li>
				<li><a data-toggle="tab" href="#favorites">Mes produits enregistrés</a></li>
				<li><a data-toggle="tab" href="#infos"><i class="fa fa-user"></i> Mes informations personnelles</a></li>
			</ul>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<div class="tab-content">

				<!-- ACCUEIL DE MON COMPTE -->

				<div id="accueil" class="tab-pane fade in active">
					<h3 class="title-content-compte">Accueil de mon compte</h3>
					<p>Mes dernières commandes :</p>
					<div class="table-responsive table-commandes">
						<table class="table">
							<thead>
							<tr>
								<th>Numéro de commande</th>
								<th>Date de commande</th>
								<th>Etat</th>
								<th>Facture</th>
								<th>Afficher</th>
							</tr>
							</thead>
							<tbody>
							@foreach($commandes_recentes as $commande_recente)
							<tr>
								<td><a href="#">{{ $commande_recente->reference }}</a></td>
								<td>{{ date("d/m/Y", strtotime($commande_recente->date)) }}</td>
								<td>{{ $commande_recente->statut->libelle }}</td>
								<td><a href="#"><i class="fa fa-file-text"></i></a></td>
								<td><a href="{{ route('compte::detailCommande', $commande_recente->reference) }}"><i class="fa fa-external-link"></i></a></td>
							</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div> 

				<!-- FIN ACCUEIL DE MON COMPTE -->


				<!-- MES COMMANDES -->

				<div id="commandes" class="tab-pane fade">
					<h3 class="title-content-compte">Mes commandes</h3>
					<p>Mon historique de commandes</p>

					@include('elements.table-commandes')
				</div>

				<!-- FIN MES COMMANDES -->

				<!-- MES ADRESSES -->

				<div id="adresses" class="tab-pane fade">
					<h3 class="title-content-compte">Mes adresses</h3>
					<div class="top-content row">
						<h4 class='col-md-8 col-xs-12'>Mes adresses enregistrées :</h4>
						<a class="col-md-4 col-xs-12 add-adresse">Ajouter une adresse <i class="fa fa-angle-right"></i></a>
					</div>
					<div class="row">
						@for ($i = 0; $i < 3; $i++)

					    	@include('elements.adresses')
					    
					    @endfor						
					</div>

				</div>

				<!-- FIN MES ADRESSES -->

				<!-- MES ARTICLES FAVORIES -->

				<div id="favorites" class="tab-pane fade">
					<h3 class="title-content-compte">Mes articles favories</h3>

						<!-- liste n°1 -->
						<div class="wishlist">
							<span class="wishlist-name"><i class="fa fa-bars"></i> Ma liste de chaises favorites</span>
							<div class="row">

								<div class="produit col-md-3 col-sm-6 col-xs-12">
									<div class="img-content">
										<img src="http://placehold.it/200x200" class="img img-reponsive" alt="">
									</div>
									<div class="produit-infos">
										<h4 class="title-produit">Chaise design en bois</h4>
										<p class="options">Matières : bois</p>
										<p class="qte">Quantité : 2</p>
										<p class="price">Prix : 170€</p>
									</div>
								</div>

								<div class="produit col-md-3 col-sm-6 col-xs-12">
									<div class="img-content">
										<img src="http://placehold.it/200x200" class="img img-reponsive" alt="">
									</div>
									<div class="produit-infos">
										<h4 class="title-produit">Chaise design en bois</h4>
										<p class="options">Matières : bois</p>
										<p class="qte">Quantité : 2</p>
										<p class="price">Prix : 170€</p>
									</div>
								</div>

								<div class="produit col-md-3 col-sm-6 col-xs-12">
									<div class="img-content">
										<img src="http://placehold.it/200x200" class="img img-reponsive" alt="">
									</div>
									<div class="produit-infos">
										<h4 class="title-produit">Chaise design en bois</h4>
										<p class="options">Matières : bois</p>
										<p class="qte">Quantité : 2</p>
										<p class="price">Prix : 170€</p>
									</div>
								</div>

								<div class="produit col-md-3 col-sm-6 col-xs-12">
									<div class="img-content">
										<img src="http://placehold.it/200x200" class="img img-reponsive" alt="">
									</div>
									<div class="produit-infos">
										<h4 class="title-produit">Chaise design en bois</h4>
										<p class="options">Matières : bois</p>
										<p class="qte">Quantité : 2</p>
										<p class="price">Prix : 170€</p>
									</div>
								</div>
							</div>
						</div>

						<div class="footer-wishlist">
							<a href="#">Ajouter ma liste au panier</a>
						</div>
						<!-- fin liste n°1 -->

						<!-- liste n°2 -->
						<div class="wishlist">
							<span class="wishlist-name"><i class="fa fa-bars"></i> Ma deuxième liste de meuble favorites</span>
							<div class="row">

								<div class="produit col-md-3 col-sm-6 col-xs-12">
									<div class="img-content">
										<img src="http://placehold.it/200x200" class="img img-reponsive" alt="">
									</div>
									<div class="produit-infos">
										<h4 class="title-produit">Chaise design en bois</h4>
										<p class="options">Matières : bois</p>
										<p class="qte">Quantité : 2</p>
										<p class="price">Prix : 170€</p>
									</div>
								</div>

								<div class="produit col-md-3 col-sm-6 col-xs-12">
									<div class="img-content">
										<img src="http://placehold.it/200x200" class="img img-reponsive" alt="">
									</div>
									<div class="produit-infos">
										<h4 class="title-produit">Chaise design en bois</h4>
										<p class="options">Matières : bois</p>
										<p class="qte">Quantité : 2</p>
										<p class="price">Prix : 170€</p>
									</div>
								</div>

								<div class="produit col-md-3 col-sm-6 col-xs-12">
									<div class="img-content">
										<img src="http://placehold.it/200x200" class="img img-reponsive" alt="">
									</div>
									<div class="produit-infos">
										<h4 class="title-produit">Chaise design en bois</h4>
										<p class="options">Matières : bois</p>
										<p class="qte">Quantité : 2</p>
										<p class="price">Prix : 170€</p>
									</div>
								</div>

								<div class="produit col-md-3 col-sm-6 col-xs-12">
									<div class="img-content">
										<img src="http://placehold.it/200x200" class="img img-reponsive" alt="">
									</div>
									<div class="produit-infos">
										<h4 class="title-produit">Chaise design en bois</h4>
										<p class="options">Matières : bois</p>
										<p class="qte">Quantité : 2</p>
										<p class="price">Prix : 170€</p>
									</div>
								</div>

							</div>
						</div>

						<div class="footer-wishlist">
							<a href="#">Ajouter ma liste au panier</a>
						</div>
						<!-- fin liste n°2 -->
				</div>

				<!-- FIN MES ARTICLES FAVORIES -->

				<!-- MES INFOS PERSONNELLES -->

				<div id="infos" class="tab-pane fade">
					<h3 class="title-content-compte">Mes informations personnelles</h3>
					<div class="personal-infos">
						<div class="form-personal-infos">
							<form method="post" action="{{ route('compte::updateClient') }}">
								{!! csrf_field() !!}
										<!-- Civilité -->
								<div class="form-group{{ ($errors->has('civilite')) ? ' has-error' : '' }}">
								    <label class="control-label">Titre</label>
									@foreach($errors->get('civilite') as $error)
										<div class="panel panel-danger"><div class="panel-body bg-danger"><p>{{ $error }}</p></div></div>
									@endforeach
									<input id="civilite-mr" name="civilite" type="radio" value="1" {{ Auth::user()->civilite_id == 1 ? 'checked': '' }}/> <span>Mr.</span>
									<input id="civilite-mme" name="civilite" type="radio" value="2" {{ Auth::user()->civilite_id == 2 ? 'checked': '' }}/> <span>Mme</span>
								</div>
								
								
								<!-- Prénom -->
								<div class="form-group{{ ($errors->has('prenom')) ? ' has-error' : '' }}">
									@foreach($errors->get('prenom') as $error)
										<div class="panel panel-danger"><div class="panel-body bg-danger"><p>{{ $error }}</p></div></div>
									@endforeach
									<label class="control-label" for="prenom">Prénom <span>*</span></label>
									<input class="form-control" id="prenom" name="prenom" type="text" value="{{ Auth::user()->prenom }}" required>
								</div>

								<!-- Nom -->
								<div class="form-group{{ ($errors->has('nom')) ? ' has-error' : '' }}">
									@foreach($errors->get('nom') as $error)
										<div class="panel panel-danger"><div class="panel-body bg-danger"><p>{{ $error }}</p></div></div>
									@endforeach
									<label class="control-label" for="nom">Nom <span>*</span></label>
									<input class="form-control" id="nom" name="nom" type="text" value="{{ Auth::user()->nom }}" required>
								</div>

								<!-- Adresse email -->
								<div class="form-group{{ ($errors->has('email')) ? ' has-error' : '' }}">
									@foreach($errors->get('email') as $error)
										<div class="panel panel-danger"><div class="panel-body bg-danger"><p>{{ $error }}</p></div></div>
									@endforeach
									<label class="control-label" for="email">Adresse e-mail <span>*</span> </label>
									<input class="form-control" id="email" name="email" type="email" value="{{ Auth::user()->email }}" required>
								</div>

								<!-- Date de naissance -->
								<div class="form-group{{ ($errors->has('date-naissance')) ? ' has-error' : '' }}">
									@foreach($errors->get('date-naissance') as $error)
										<div class="panel panel-danger"><div class="panel-body bg-danger"><p>{{ $error }}</p></div></div>
									@endforeach
									<label class="control-label" for="date">Date de naissance </label>
									<input class="form-control" id="date" name="date-naissance" type="date" value="{{ Auth::user()->date_naissance }}">
								</div>

								<!-- Mot de passe actuel -->
								<div class="form-group{{ ($errors->has('actual_password')) ? ' has-error' : '' }}">
									@foreach($errors->get('actual_password') as $error)
										<div class="panel panel-danger"><div class="panel-body bg-danger"><p>{{ $error }}</p></div></div>
									@endforeach
									<label class="control-label" for="password">Mot de passe actuel <span>*</span> </label>
									<input class="form-control" id="password" name="password" type="password" required>
								</div>

								<!-- Nouveau mot de passe-->
								<div class="form-group{{ ($errors->has('new-password')) ? ' has-error' : '' }}">
									@foreach($errors->get('new-password') as $error)
										<div class="panel panel-danger"><div class="panel-body bg-danger"><p>{{ $error }}</p></div></div>
									@endforeach
									<label class="control-label" for="new-password">Votre nouveau mot de passe<span>*</span> </label>
									<input class="form-control" id="new-password" name="new-password" type="password">
								</div>	

								<!-- Confirmation du mot de passe-->
								<div class="form-group{{ ($errors->has('new-password')) ? ' has-error' : '' }}">
									<label class="control-label" for="new-password-confirm">Confirmer votre nouveau mot de passe <span>*</span> </label>
									<input class="form-control" id="new-password-confirm" name="new-password_confirmation" type="password">
								</div>								

								<!-- Bouton valider -->
								<div class="form-group submit-button">
									<input class="hdg-button-small" id="submit" name="submit" type="submit" value="Enregistrer" />
								</div>	
							</form>

						</div>	
					</div>
				</div>

				<!-- FIN MES INFOS PERSONNELLES -->
				<script>
					var url = document.location.toString();
					if ( url.match('#') ) {
						var tab = '#'+url.split('#')[1];
						$('#accueil').removeClass('active');
						$(tab).addClass('in active');

						var navigationTabs = $("ul.nav.nav-tabs.mon-compte-nav");
						navigationTabs.children().removeClass('active');
						var activeLink = $('a[href="'+tab+'"]');
						activeLink.parent().addClass('active');
					}
				</script>

			</div>
		</div>
	</div>
</div>

@endsection



