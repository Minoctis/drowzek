@extends('layouts.default')

@section('title', 'Mon compte - Home de goût')

@section('page-id', 'moncompte')

@section('breadcrumbs')
	<li class="active">Mon compte</li>
@endsection

@section('content')
<div class="moncompte">
	<div class="entete-page">
		<img src="{{ asset('img/themes/header-compte.jpg') }}" class="img img-reponsive" alt="Mon Compte">
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
				<!-- <li><a data-toggle="tab" href="#favorites">Mes produits enregistrés</a></li>-->
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
								<td><a target="_blank" href="{{ route('facture', $commande_recente->reference) }}"><i class="fa fa-file-text"></i></a></td>
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
						<h4 class="col-md-8 col-xs-12">Mon adresse de facturation :</h4>
						<?php $index = 0; ?>
						@foreach($client->adresses as $adresse)
						@if($adresse->adresse_type_id === 2)
						<div class="row">
							<div class="adresse col-xs-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										Adresse de facturation
										<span class="remove-adresse"><a href="#"><i class="fa fa-minus-square-o"></i></a></span>
									</div>
									<div class="panel-body">
										<a href="#" class="update-adresse">Mettre à jour</a>
										@foreach($client->adresses as $adresse)
											@if($adresse->adresse_type_id === 2)
									    	@include('elements.adresses-facturation')
											@endif
									    @endforeach
									</div>
								</div>
							</div>
						</div>
						@elseif($adresse->adresse_type_id !== 2 && $index === 0)
								<div class="col-xs-12">
									<p>Pour ajouter votre adresse de facturation <a href="">cliquez-ici</a>.</p>
								</div>
						@endif
							<?php $index++;?>
						@endforeach
						<h4 class='col-md-8 col-xs-12'>Mes adresses de livraison :</h4>
						<a class="col-md-4 col-xs-12 add-adresse" id="compte-add-adresse-show">Ajouter une adresse <i class="fa fa-angle-right"></i></a>
					</div>
					<div class="row">
						@foreach($client->adresses as $adresse)
							@if($adresse->adresse_type_id === 1)
					    	@include('elements.adresses')
							@endif
					    @endforeach
					</div>

					<form action="{{ route('compte::addAdresse') }}" style="display:none;" method="POST"  id="compte-add-adresse">
						{{ csrf_field() }}

						<div class="top-content row">
							<h4 class="">Ajouter une nouvelle adresse :</h4>
						</div>


						<!-- Société -->
						<div class="form-group">
							<label class="control-label" for="add-societe">Société <span>*</span></label>
							<input class="form-control" id="add-societe" name="societe" type="text" required>
						</div>

						<!-- Prénom -->
						<div class="form-group">
							<label class="control-label" for="add-prenom">Prénom <span>*</span></label>
							<input class="form-control" id="add-prenom" name="prenom" type="text" required>
						</div>

						<!-- nom -->
						<div class="form-group">
							<label class="control-label" for="add-nom">Nom <span>*</span></label>
							<input class="form-control" id="add-nom" name="nom" type="text" required>
						</div>

						<!-- Adresse ligne 1 -->
						<div class="form-group">
							<label class="control-label" for="add-adresse">Adresse <span>*</span></label>
							<input class="form-control" id="add-adresse" name="adresse" type="text" required>
						</div>

						<!-- Adresse ligne 2 -->
						<div class="form-group">
							<label class="control-label" for="add-comp-adresse">Complément d'adresse <span>*</span></label>
							<input class="form-control" id="add-comp-adresse" name="comp-adresse" type="text" required>
						</div>

						<!-- Code postale -->
						<div class="form-group">
							<label class="control-label" for="add-cp">Code postal <span>*</span></label>
							<input class="form-control" id="add-cp" name="cp" type="text" required>
						</div>

						<!-- Ville -->
						<div class="form-group">
							<label class="control-label" for="add-ville">Ville <span>*</span></label>
							<input class="form-control" id="add-ville" name="ville" type="text" required>
						</div>

						<!-- Pays -->
						<div class="form-group">
							<label class="control-label" for="add-pays">Pays <span>*</span></label>
							<input class="form-control" id="add-pays" name="pays" type="text" required>
						</div>

						<!-- Numero Tel -->
						<div class="form-group">
							<label class="control-label" for="add-tel">Numéro de téléphone <span>*</span></label>
							<input class="form-control" id="add-tel" name="tel" type="text" required>
						</div>

						<!-- Nom adresse -->
						<div class="form-group">
							<label class="control-label" for="add-adressename">Donnez un titre à cette adresse pour la retrouver plus facilement <span>*</span></label>
							<input class="form-control" id="add-adressename" name="adressename" type="text" required>
						</div>

						<button class="hdg-button-default" id="compte-add-adresse-hide" type="button">Annuler</button>
						<button class="hdg-button-default" type="submit">Enregistrer</button>
					</form>


					<form action="{{ route('compte::editAdresse') }}" method="POST" style="display:none;" id="compte-edit-adresse">
						{{ csrf_field() }}

						<div class="top-content row">
							<h4 class="">Mettre à jour votre adresse</h4>
						</div>


						<!-- Société -->
						<div class="form-group">
							<label class="control-label" for="update-société">Société <span>*</span></label>
							<input class="form-control" id="update-société" name="société" type="text" required>
						</div>

						<!-- Prénom -->
						<div class="form-group">
							<label class="control-label" for="update-prenom">Prénom <span>*</span></label>
							<input class="form-control" id="update-prenom" name="prenom" type="text" required>
						</div>

						<!-- nom -->
						<div class="form-group">
							<label class="control-label" for="update-nom">Nom <span>*</span></label>
							<input class="form-control" id="update-nom" name="nom" type="text" required>
						</div>

						<!-- Adresse ligne 1 -->
						<div class="form-group">
							<label class="control-label" for="update-adress">Adresse <span>*</span></label>
							<input class="form-control" id="update-adresse" name="adresse" type="text" required>
						</div>

						<!-- Adresse ligne 2 -->
						<div class="form-group">
							<label class="control-label" for="update-comp-adresse">Complément d'adresse <span>*</span></label>
							<input class="form-control" id="update-comp-adresse" name="comp-adresse" type="text" required>
						</div>

						<!-- Code postale -->
						<div class="form-group">
							<label class="control-label" for="update-cp">Code postal <span>*</span></label>
							<input class="form-control" id="update-cp" name="cp" type="text" required>
						</div>

						<!-- Ville -->
						<div class="form-group">
							<label class="control-label" for="update-ville">Ville <span>*</span></label>
							<input class="form-control" id="update-ville" name="ville" type="text" required>
						</div>

						<!-- Pays -->
						<div class="form-group">
							<label class="control-label" for="update-pays">Pays <span>*</span></label>
							<input class="form-control" id="update-pays" name="pays" type="text" required>
						</div>

						<!-- Numero Tel -->
						<div class="form-group">
							<label class="control-label" for="update-tel">Numéro de téléphone <span>*</span></label>
							<input class="form-control" id="update-tel" name="tel" type="text" required>
						</div>

						<!-- Nom adresse -->
						<div class="form-group">
							<label class="control-label" for="update-adressename">Donnez un titre à cette adresse pour la retrouver plus facilement <span>*</span></label>
							<input class="form-control" id="update-adressename" name="adressename" type="text" required>
						</div>

						<button class="hdg-button-default" id="compte-edit-adresse-hide" type="button">Annuler</button>
						<button class="hdg-button-default" type="submit">Enregistrer</button>
					</form>




				</div>



				<!-- FIN MES ADRESSES -->

				<!-- MES ARTICLES FAVORIS -->

				<div id="favorites" class="tab-pane fade">
					<h3 class="title-content-compte">Mes articles favoris</h3>
						@include('elements.wishlist-compte')
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



