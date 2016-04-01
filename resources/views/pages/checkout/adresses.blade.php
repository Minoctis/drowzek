@extends('layouts.checkout')

@section('title', 'Étape 1 : Vos Adresses')

@section('page-id', 'checkout-adresses')

@section('content')
<div class="container">
	<form>
		<div class="row">
			<ul class="nav nav-pills nav-justified nav-checkout">
				<li role="presentation">identification</li>
				<li role="presentation" class="active">adresses</li>
				<li role="presentation">livraison</li>
				<li role="presentation">paiement</li>
				<li role="presentation">confirmation</li>
			</ul>
		</div>
		<div class="row black-border">
			<div class="col-lg-7">
				<h4>Choisissez une adresse de livraison</h4>
				<p>
					<select>
						<option>Mon adresse</option>
						<option>Adresse 1</option>
						<option>Adresse 2</option>
					</select>
				</p>
				<p>
					<input type="checkbox">Utiliser la même adresse pour la facturation
				</p>
				<div class="panel panel-default">
					<div class="panel-heading">
						Votre adresse de livraison
						<span class="remove-adresse"><a href="#"><i class="fa fa-minus-square-o"></i></a></span>
					</div>
					<div class="panel-body">
						<a href="#" class="update-adresse">Mettre à jour</a>
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

				<div class="panel panel-default">
					<div class="panel-heading">
						Votre adresse de facturation
						<span class="remove-adresse"><a href="#"><i class="fa fa-minus-square-o"></i></a></span>
					</div>
					<div class="panel-body">
						<a href="#" class="update-adresse">Mettre à jour</a>
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

				<p>
					Ajouter une nouvelle adresse
				</p>

			</div>
			<div class="col-lg-5 left-border">
				<div class="container-fluid">
					<h4>Mon panier</h4>
					<div class="row overflow-panier">
						@for ($i = 0; $i < 8; $i++)
							
							@include('elements.checkout-product')

						@endfor
					</div>
					<div class="row black-border">
						<div class="row">
							<div class="col-lg-6 right-content">
								Total TTC:
							</div>
							<div class="col-lg-6 right-content">
								1899 €
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 right-content">
								Total hors taxes:
							</div>
							<div class="col-lg-6 right-content">
								1500 €
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 right-content">
								Total TVA 20%:
							</div>
							<div class="col-lg-6 right-content">
								499 €
							</div>
						</div>
					</div>
					<div class="row black-border">
						<div class="row">
							<div class="col-lg-6 right-content">
								Montant Total TTC:
							</div>
							<div class="col-lg-6 right-content">
								1899 €
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				Revenir au panier
			</div>
			<div class="col-lg-6 right-content">
				<button class="hdg-button-default" type="submit">Choisir ma livraison</button>
			</div>
		</div>
	</form>
</div>
@endsection