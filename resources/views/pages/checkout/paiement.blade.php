@extends('layouts.checkout')

@section('title', 'Étape 3 : Paiement')

@section('page-id', 'checkout-paiement')

@section('content')

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
				<li role="presentation">Adresses</li>
				<li role="presentation">Livraison</li>
				<li role="presentation"class="active">Paiement</li>
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
									<span class="carte-bancaire">carte bancaire</span> <br>
									
								</div>

								
								
							</li>
						</div>
						<!-- fin mode1 -->

						<!-- mode2 -->
						<div class="row">
							<input name="livraison" type="radio" />
							<li>
								<div class="col-md-10 col-xs-10">
									<span class="Paypal">Paypal</span> <br>
									
								</div>

																
							</li>
						</div>
						<!-- fin mode2 -->
<div class="row">
							<p><input name="livraison" type="radio" /> J'accepte les <a href="#">conditions générales de ventes</a></p>

						</div>

					</ul>
					<div class="panel panel-default">
							<div class="panel-heading">
								Votre adresse de facturation
								<span class="remove-adresse"><a href="#"><i class="fa fa-minus-square-o"></i></a></span>
							</div>
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

					<!--<div class="panel panel-default">
							<div class="panel-heading">
								Votre adresse de facturation
								<span class="remove-adresse"><a href="#"><i class="fa fa-minus-square-o"></i></a></span>
							</div>
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
					</div>-->


				</div>




				


				<div class="col-md-5 col-xs-12 checkout-right-content recap-panier">
					@include('elements.checkout-mini-panier')
				</div>
			</div>

		</div>
	</div>

	<div class="checkout-footer">
		<a class="back-to-panier" href="#">Revenir au panier</a>

		<a class="next-step hdg-button-small" href="#">Choisir ma livraison</a>
	</div>
</div>
</form>


@endsection