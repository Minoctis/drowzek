		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="product-container">
				<div class="image-content">
					<div class="call-add-basket">
						<div class="call-product-page">
							<a href="{{ route('produit', ['slug' => $produit['slug']) }}">Afficher</a>
						</div>
					</div>
					<div>
						<img src="http://placehold.it/250x250"  width="100%" />
					</div>
				</div>
				<div class="caption">
					<div class="desc-product">
						<h3 class="product-title-list">{{ $produit['nom'] }}</h3>
					</div>
					<div class="price-product">
						{{ round($produit['option']['prix_ht'] + ($produit['option']['prix_ht'] * $produit['option']['taux_tva']['valeur'] / 100), 2) }} €
					</div>
				</div>
				<div class="bloc-add-basket">
					<p><a href="#" class="btn btn-primary hdg-button-default button-add-basket" role="button">Ajouter au panier</a></p>
				</div>
			</div>
		</div>