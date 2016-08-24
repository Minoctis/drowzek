<div class="product-recap-panier">
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
			<div class="img-content">
				<img src="{{ $produit->produit->images->count() !== 0 ? '/img/products/'.$produit->produit->images[0]->img_name : 'http://placehold.it/200x200' }}" class="img img-reponsive" alt="{{ $produit->produit->nom }}" title="{{ $produit->produit->nom }}">
			</div>
		</div>

		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
			<div class="produit-infos">
				<h4 class="title-produit">{{ $produit->produit->nom }}</h4>
				<p class="options">Matières : {{ $produit->libelle }}</p>
				<p class="qte">Quantité : {{ $quantites[$produit->id] }}</p>
				<p class="price">Prix : {{ round(($produit->prix_ht + $produit->prix_ht * $produit->tauxTva->valeur / 100) * $quantites[$produit->id], 2) }} €</p>
			</div>
		</div>
	</div>	
</div>
