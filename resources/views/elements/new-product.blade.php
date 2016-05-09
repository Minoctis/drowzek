		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="product-container">
				<div class="image-content">
					<div class="call-add-basket">
						<div class="call-product-page">
							<a href="{{ route('produit', $produit->slug) }}">Afficher</a>
						</div>
					</div>
					<div class="product-thumbnail-image" style="background-image: url('{{isset($produit->images[0]) ? '/img/products/'.$produit->images[0]->img_name :'http://placehold.it/250x250'}}');">
					</div>
				</div>
				<div class="caption">
					<div class="desc-product">
						<h3 class="product-title-list">{{ $produit->nom }}</h3>
					</div>
					<div class="price-product">
						{{ round(($produit->options[0]->prix_ht + $produit->options[0]->prix_ht * $produit->options[0]->tauxTva->valeur / 100), 2) }} €
					</div>
				</div>
				<div class="bloc-add-basket">
					<p><a href="#" class="btn btn-primary hdg-button-default button-add-basket" role="button">Ajouter au panier</a></p>
				</div>
			</div>
		</div>