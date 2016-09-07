@extends('layouts.checkout')

@section('title', 'Étape 3 : Paiement')

@section('page-id', 'checkout-paiement')

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
						<h3>Mode de paiement</h3>
					</div>
					<ul class="mode-livraison">
						<!-- mode1 -->
						<div class="row">
							<li>
								<div class="col-md-10 col-xs-10">
									<span class="carte-bancaire">carte bancaire</span> <br>
									
								</div>
							</li>
						</div>
						<!-- fin mode1 -->

                        <div class="row">
							<p><input name="livraison" type="checkbox" /> J'accepte les <a href="#">conditions générales de ventes</a></p>

						</div>

					</ul>
					<div class="panel panel-default">
							<div class="panel-heading">
								Votre adresse de facturation
								<span class="remove-adresse"><a href="#"><i class="fa fa-minus-square-o"></i></a></span>
							</div>
							<div class="panel-body">

								@foreach($client->adresses as $adresse)
									@if($adresse->adresse_type_id === 2)
							    	@include('elements.adresses-facturation')
									@endif
							    @endforeach
						</div>
					</div>

					<div class="panel panel-default">
							<div class="panel-heading">
								Votre adresse de facturation
								<span class="remove-adresse"><a href="#"><i class="fa fa-minus-square-o"></i></a></span>
							</div>
							<div class="panel-body">

								@foreach($client->adresses as $adresse)
											@if($adresse->adresse_type_id === 2)
									    	@include('elements.adresses-facturation')
											@endif
									    @endforeach
						</div>
					</div>


				</div>




				


				<div class="col-md-5 col-xs-12 checkout-right-content recap-panier">
					@include('elements.checkout-mini-panier')
				</div>
			</div>

		</div>
	</div>

	<div class="checkout-footer">
		<a class="back-to-panier" href="{{ route('panier') }}">Revenir au panier</a>

		<a class="next-step hdg-button-small" href="{{ route('checkout::tpe') }}">Procéder au paiement</a>
	</div>
</div>
</form>


@endsection