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
			<p>Bonjour, <span>Lorem ipsum</span> </p>
			<a href="#" class="logout"><i class="fa fa-sign-out"></i> Se déconnecter</a>

			<ul class="nav nav-tabs mon-compte-nav">
				<li class="active"><a data-toggle="tab" href="#accueil"><i class="fa fa-home"></i> Accueil de mon compte</a></li>
				<li><a data-toggle="tab" href="#commandes">Mes commandes</a></li>
				<li><a data-toggle="tab" href="#infos-commande">Information de commande</a></li>
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

					<div class="commande-infos">
						<div class="top-content row">
							<h4 class="sub-title-content-commande col-md-9 col-xs-12">Information de la commande :</h4>
							<p class="infos-link facture col-md-3 col-xs-12"><a href="#">Imprimer la facture</a></p>
						</div>


						<!-- Liste des produits commandés -->
						<div class="produit-commandes">
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
							<ul class="pagination">
							  	<li><a href="#">1</a></li>
							  	<li><a href="#">2</a></li>
							 	<li><a href="#">3</a></li>
							  	<li><a href="#">4</a></li>
							  	<li><a href="#">5</a></li>
							</ul>
						</div>
						<!-- Fin de liste produits commandés -->

					</div>

					<!-- Récapitulatif de la commande -->

					<div class="recap-commande">
						<div class="row">
							<h4 class="sub-title-content-commande col-md-4 col-xs-12">Récapitulatif</h4>
							<div class="recap-infos col-md-8 col-xs-12">
								<div class="table-responsive">
									<table class="table">
										<tr>
											<td>Mode de livraison choisi :</td>
											<td>9 €</td>
										</tr>
										<tr>
											<td>Total HT :</td>
											<td>1899 €</td>
										</tr>
										<tr>
											<td>Total TTC :</td>
											<td>2000 €</td>
										</tr>
										<tr>
											<td>Dont TVA :</td>
											<td>200 €</td>
										</tr>

										<!-- Montant Total -->
										<tr class="last">
											<td>Montant Total :</td>
											<td>2000 €</td>
										</tr> 
										<!-- Fin Montant Total -->

									</table>
								</div>
							</div>	
						</div>
					</div>

					<!-- Fin du récap de commande -->

					<!-- Informations de livraison -->

					<div class="livraison-infos">
						<div class="top-content row">
							<h4 class="sub-title-content-commande col-md-9 col-xs-12">Information de livraison :</h4>
							<p class="infos-link suivi col-md-3 col-xs-12"><a href="#">Suivi de la commande</a></p>
						</div>

						<p class="mode-livraison">Vous avez choisi la livraison à domicile</p>



						<div class="adresses">

							<div class="row">

								<!-- adresse de livraison -->
								<div class="adresse-livraison col-md-6 col-xs-12">
									<div class="panel panel-default">
										<div class="panel-heading">Votre adresse de livraison</div>
										<div class="panel-body">
											<ul>
												<li>
													<span class="nom-client">Lorem</span>
													<span class="prenom-client"> ipsum</span>
												</li>
												<li>
													<span class="adresse">100 rue national</span>
												</li>
												<li>
													<span class="compl-adresse">Complement d'adresse</span>
												</li>
												<li>
													<span class="ville">Lille</span>
													<span class="cp">59000</span>
												</li>
												<li>
													<span class="pays">France</span>
												</li>
											</ul>
										</div>
									</div>
								</div>

								<!-- fin adresse de livraison -->

								<!-- adresse de factutation -->
								
								<div class="adresse-livraison col-md-6 col-xs-12">
									<div class="panel panel-default">
										<div class="panel-heading">Votre adresse de livraison</div>
										<div class="panel-body">
											<ul>
												<li>
													<span class="nom-client">Lorem</span>
													<span class="prenom-client"> ipsum</span>
												</li>
												<li>
													<span class="adresse">100 rue national</span>
												</li>
												<li>
													<span class="compl-adresse">Complement d'adresse</span>
												</li>
												<li>
													<span class="ville">Lille</span>
													<span class="cp">59000</span>
												</li>
												<li>
													<span class="pays">France</span>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- fin adresse de facturation -->
							</div>

						</div>
					</div>

					<!-- Fin informations de livraison -->


					<!-- Informations de paiement -->
					<div class="paiement-infos">
						<div class="top-content row">
							<h4 class="sub-title-content-commande col-md-9 col-xs-12">Information de paiement :</h4>
						</div>

						<div class="paiement">
							<p class="mode-paiement">Vous avez choisi le paiement par <span class="mode">carte bancaire</span>, montant payé de <span class="price">1809 €</span></p>
						</div>
					</div>
					<!-- Fin informations de paiement -->



				</div>

				<!-- FIN INFORMATION DE COMMANDE -->

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
							<form>
								<!-- Civilité -->
								<div class="form-group">
								    <label >Titre</label>
									<input id="civilite" name="civilite" type="radio" /> <span>Mr.</span>
									<input id="civilite" name="civilite" type="radio" /> <span>Mme</span>
								</div>
								
								
								<!-- Prénom -->
								<div class="form-group">
									<label for="prenom">Prénom <span>*</span></label>
									<input id="prenom" name="prenom" type="text"></input>
								</div>

								<!-- Nom -->
								<div class="form-group">
									<label for="nom">Nom <span>*</span></label>
									<input id="nom" name="nom" type="text"></input>
								</div>

								<!-- Adresse email -->
								<div class="form-group">
									<label for="email">Adresse e-mail <span>*</span> </label>
									<input id="email" name="email" type="email"></input>
								</div>

								<!-- Date de naissance -->
								<div class="form-group">
									<label for="date">Date de naissance </label>
									<input id="date" name="date" type="date"></input>
								</div>

								<!-- Mot de passe actuel -->
								<div class="form-group">
									<label for="password">Mot de passe actuel <span>*</span> </label>
									<input id="password" name="password" type="password"></input>
								</div>

								<!-- Nouveau mot de passe-->
								<div class="form-group">
									<label for="new-password">Votre nouveau mot de passe<span>*</span> </label>
									<input id="new-password" name="new-password" type="password"></input>
								</div>	

								<!-- Confirmation du mot de passe-->
								<div class="form-group">
									<label for="new-password-confirm">Confirmer votre nouveau mot de passe <span>*</span> </label>
									<input id="new-password-confirm" name="new-password-confirm" type="password"></input>
								</div>								

								<div class="form-group submit-button">
									<input class="hdg-button-small" id="submit" name="submit" type="submit" value="Enregistrer" />
								</div>	
							</form>

						</div>	
					</div>
				</div>

				<!-- FIN MES INFOS PERSONNELLES -->


			</div>
		</div>
	</div>
</div>

@endsection



