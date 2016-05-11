@extends('layouts.checkout')

@section('title', 'Étape 4 : Confirmation')

@section('page-id', 'checkout-confirmation')

@section('content')

<form>
<div class="container">
	<div class="checkout-panel">
		<div class="checkout-header">
			<ul class="nav nav-pills nav-justified nav-checkout">
				<li role="presentation" >Identification</li>
				<li role="presentation" >Adresses</li>
				<li role="presentation">Livraison</li>
				<li role="presentation">Paiement</li>
				<li role="presentation" class="active">Confirmation</li>
			</ul>
		</div>


		<div class="checkout-content-panel">
			<div class="row">
				<div class="col-md-12 col-xs-12 checkout">
					<div class="title-checkout-panel">
						<h3>Merci pour votre commande N</h3>
					</div>
					 
					 <div class="row">
					 	<p>Vous avez effectuer une commande d'un montant de 1290€ sur notre boutique homedegout.com par carte bancaire.</p>
					 	<p>Vous pouvez accéder à tout moment au suivi de votre commande et télécharger votre facture dans <a>Historique commandes </a>de la rubrique <a>Mon compte</a> sur notre site.</p>
					 </div>
						<!-- mode1 -->
						
						<!-- fin mode2 -->

					</ul>


				</div>

				
			</div>

		</div>
	</div>

	<div class="checkout-footer">
		<a class="back-to-panier" href="#">Cas:Erreur paiement</a>

		<a class="next-step hdg-button-small" href="http://drowzek.loc/">Aller vers la page d'accueil</a>
	</div>
</div>
</form>

@endsection