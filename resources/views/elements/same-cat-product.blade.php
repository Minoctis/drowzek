<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	<div class="product-container">
		<div class="image-content">
			<div class="call-add-basket">
				<div class="call-product-page">
					<a href="{{ route('produit', $related_produit->slug) }}" alt="{{ $related_produit->nom }}" title="{{ $related_produit->nom }}">Afficher</a>
				</div>
			</div>
			<div class="product-thumbnail-image" style="background-image: url('{{isset($related_produit->images[0]) ? '/img/products/'.$related_produit->images[0]->img_name :'http://placehold.it/250x250'}}');">
			</div>
		</div>
		<div class="caption">
			<div class="desc-product">
				<h3 class="product-title-list">{{ $related_produit->nom }}</h3>
			</div>
			<div class="price-product">
				{{ round(($related_produit->options[0]->prix_ht + $related_produit->options[0]->prix_ht * $related_produit->options[0]->tauxTva->valeur / 100), 2) }} €
			</div>
		</div>
		<div class="bloc-add-basket">
			<p><a class="btn btn-primary hdg-button-default button-add-basket" role="button" data-option-id="{{ $related_produit->options[0]->id }}" data-nom="{{ $related_produit->nom }}" alt="{{ $related_produit->nom }}" title="{{ $related_produit->nom }}">Ajouter au panier</a></p>
		</div>
	</div>
</div>