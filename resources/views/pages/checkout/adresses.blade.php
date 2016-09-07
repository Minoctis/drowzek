@extends('layouts.checkout')

@section('title', 'Étape 2 : Adresses')

@section('page-id', 'checkout-adresses')

@section('content')

<form>
<div class="container">
	<div class="checkout-panel">
		<div class="checkout-header">
			<ul class="nav nav-pills nav-justified nav-checkout">
				<li role="presentation" >Identification</li>
				<li role="presentation" class="active">Adresses</li>
				<li role="presentation">Livraison</li>
				<li role="presentation">Paiement</li>
				<li role="presentation">Confirmation</li>
			</ul>
		</div>


		<div class="checkout-content-panel">
			<div class="row">
				<div class="col-md-7 col-xs-12 checkout-left-content">
					<div class="adresse-livraison">
						<div class="title-checkout-panel">
							<h3>Choisissez une adresse de livraison</h3>
						</div>
						<select class="select-livraison">
							<option>Mon adresse</option>
							<option>Adresse 1</option>
							<option>Adresse 2</option>
						</select>

						<p class="checkbox-facturation">
							<input type="checkbox"> <label>Utiliser la même adresse pour la facturation</label> 
						</p>

						<div class="panel panel-default">
							<div class="panel-heading">
								Votre adresse de livraison
								<span class="remove-adresse"><a href="#"><i class="fa fa-minus-square-o"></i></a></span>
							</div>
							<div class="panel-body">
								<a href="#" class="update-adresse">Mettre à jour</a>
								@foreach($client->adresses as $adresse)
									@if($adresse->adresse_type_id === 1)
							    	@include('elements.adresses-facturation')
									@endif
							    @endforeach
							</div>
						</div>
					</div>
						
					<div class="adresse-facturation">
						<div class="title-checkout-panel">
							<h3>Choisissez une adresse de facturation</h3>
						</div>

						<select class="select-facturation">
							<option>Mon adresse</option>
							<option>Adresse 1</option>
							<option>Adresse 2</option>
						</select>

						<div class="panel panel-default">
							<div class="panel-heading">
								Votre adresse de facturation
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
						

					<a class="add-new-adresse" href="#">Ajouter une nouvelle adresse</a>
						
					

				</div>

				<div class="col-md-5 col-xs-12 checkout-right-content recap-panier">
					@include('elements.checkout-mini-panier')
				</div>
			</div>

		</div>
	</div>

	<div class="checkout-footer">
		<a class="back-to-panier" href="{{ route('panier') }}">Revenir au panier</a>

		<a class="next-step hdg-button-small" href="{{ route('checkout::livraison') }}">Continuer</a>
	</div>
</div>
</form>


@endsection