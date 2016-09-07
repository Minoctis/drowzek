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
				<li role="presentation"class="active">Paiement TPE</li>
				<li role="presentation">Confirmation</li>
			</ul>
		</div>


		<div class="checkout-content-panel">
			<div class="row">
				<div class="col-md-7 col-xs-12 checkout-left-content">
					<div class="title-checkout-panel">
						<h3>Paiement via : 
							@if($client->paiement_type_id === 2)
								Paypal
							@else
								CB
							@endif
					</div>
					<ul class="mode-livraison">
						@if($client->paiement_type_id === 2)
							Lien vers page Paypal pour paiement
						@else
							<div class="form-group">
	                            <label class="control-label" for="nom">Nom <span></span></label>
	                            <input class="form-control" id="nom" name="nom" type="text" value="{{$client->nom}}" required>
	                        </div>
	                        <div class="form-group">
	                            <label class="control-label" for="numero-carte">Numéro de carte <span></span></label>
	                            <input class="form-control" id="numero-carte" name="numero-carte" type="text" value="" required>
	                        </div>
	                        <div class="form-group">
	                            <label class="control-label" for="numero-clef">Code clef Carte <span></span></label>
	                            <input class="form-control" id="numero-clef" name="numero-clef" type="text" value="" required>
	                        </div>
						@endif
					</ul>
				</div>
				<div class="col-md-5 col-xs-12 checkout-right-content recap-panier">
					<p>
						<a class="next-step hdg-button-small" href="{{ route('checkout::confirmation') }}">Procéder au paiement</a>
					</p>
				</div>
			</div>

		</div>
	</div>

	<div class="checkout-footer">
		
		
	</div>
</div>
</form>


@endsection