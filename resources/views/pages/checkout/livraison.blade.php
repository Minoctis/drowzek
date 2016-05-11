@extends('layouts.checkout')

@section('title', 'Étape 3 : Livraison')

@section('page-id', 'checkout-livraison')

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
					<div class="title-checkout-panel">
						<h3>Choisissez un mode de livraison</h3>
					</div>
					<ul class="mode-livraison">
						<!-- mode1 -->
						<div class="row">
							<input name="livraison" type="radio" />
							<li>
								<div class="col-md-10 col-xs-10">
									<span class="livraison-name">Livraison à domicile</span> <br>
									<span class="temps-expedition">Expédition sous 24H</span> <br>
									<span class="price-livraison">Prix : 199€</span>
								</div>

								<div class="col-md-2  col-xs-2">
									<div class="livraison-img">
										<img src="http://placehold.it/200x250" class="img img-reponsive" alt="">
									</div>
								</div>
								
							</li>
						</div>
						<!-- fin mode1 -->

						<!-- mode2 -->
						<div class="row">
							<input name="livraison" type="radio" />
							<li>
								<div class="col-md-10 col-xs-10">
									<span class="livraison-name">Livraison à domicile</span> <br>
									<span class="temps-expedition">Expédition sous 24H</span> <br>
									<span class="price-livraison">Prix : 199€</span>
								</div>

								<div class="col-md-2 col-xs-2">
									<div class="livraison-img">
										<img src="http://placehold.it/200x250" class="img img-reponsive" alt="">
									</div>
								</div>
								
							</li>
						</div>
						<!-- fin mode2 -->

					</ul>


				</div>

				<div class="col-md-5 col-xs-12 checkout-right-content recap-panier">
					@include('elements.checkout-mini-panier')
				</div>
			</div>

		</div>
	</div>

	<div class="checkout-footer">
		<a class="back-to-panier" href="{{ route('panier') }}">Revenir au panier</a>

		<a class="next-step hdg-button-small" href="{{ route('checkout::paiement') }}">Choisir mon mode de paiement</a>
	</div>
</div>
</form>


@endsection