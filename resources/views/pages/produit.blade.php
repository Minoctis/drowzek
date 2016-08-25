@extends('layouts.default')

@section('title',  $produit->nom )

@section('page-id', 'fiche-produit')

@section('breadcrumbs')
	<li><a href="{{ route('creations', $produit->categorie->slug) }}">{{ $produit->categorie->nom }}</a></li>
	<li class="active">{{ $produit->nom }}</li>
@endsection

@section('content')

<div class="row fiche-produit">
		<div class="product-images">
			
			<div class="align-bottom bloc-images">
				<div class="carousel slide article-slide" id="myCarousel">
			     	<div class="carousel-inner cont-slider">
						@if($produit->images->count() === 0)
							<div class="item active">
								<img src="http://placehold.it/1000x1000/999999/cccccc" alt="{{ $produit->nom }}" title="{{ $produit->nom }}">
							</div>
						@endif
						@foreach($produit->images as $key => $image)
							<div class="item{{ $key === 0 ? ' active' : '' }}">
								<img src="/img/products/{{$image->img_name}}" alt="{{ $produit->nom }}" title="{{ $produit->nom }}">
							</div>
						@endforeach
			     	</div>
			      <!-- Indicators -->
			     	<ol class="carousel-indicators visible-lg visible-md">
						@if($produit->images->count() === 0)
							<li class="active" data-slide-to="0" data-target="#myCarousel">
								<img src="http://placehold.it/1000x1000/999999/cccccc" alt="{{ $produit->nom }}" title="{{ $produit->nom }}">
							</li>
						@endif
						@foreach($produit->images as $key => $image)
							<li {{ $key === 0 ? 'class="active"' : '' }} data-slide-to="{{ $key }}" data-target="#myCarousel">
								<img src="/img/products/{{$image->img_name}}" alt="{{ $produit->nom }}" title="{{ $produit->nom }}">
							</li>
						@endforeach
			     	</ol>                 
			    </div>
			</div>
		</div>
			<div class="product-description">
				<h1 class="product-title">{{ $produit->nom }}</h1>
				<p>Description :</p>
				<p>{{ $produit->description }}</p>
				<p>
					Dimensions : {{ $produit->dimensions }}
				</p>
				<p class="reviews">
					<!-- Note des clients ayant acheté ce produit : 5/5,--><a href="#comment">Afficher les avis</a>
				</p>			
				<div class="row">
					<div class="col-lg-12 produit-options">
						<div class="row">
							@foreach($options as $option)
								<div class="item col-md-1 col-xs-12"><a href=""><img src="{{ '/img/products/options/'.$option->img_name }}" title="{{ $option->libelle }}"></a></div>
							@endforeach
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<p class="product-price">
							Prix : <strong>{{ round($options[0]->prix_ht + ($options[0]->prix_ht * $options[0]->tauxTva->valeur / 100), 2) }} €</strong>
						</p>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<p><a href="#" class="btn btn-primary hdg-button-default button-add-basket" data-option-id="{{ $produit->options[0]->id }}" data-nom="{{ $produit->nom }}" role="button">Ajouter au panier</a></p>
					</div>
				</div>	
				<div class="row">
					<div class="col-xs-12">
						<p class="share-content"><i class="fa fa-share-alt-square"></i> Partagez sur les réseaux sociaux</p> 
						<div class="">
							<!-- Go to www.addthis.com/dashboard to customize your tools -->
							<div class="addthis_sharing_toolbox"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<a class="add-to-wishlist" href="#"><i class="fa fa-heart"></i> Coup de coeur</a>
					</div>
				</div>

			</div>

</div>

<div class="product-bottom">
	<div class="container">
		<div class="related-product">
			<div class="row">
				<h3 class="related-product-title">Produits dans la même catégorie</h3>
				@foreach ($related_produits as $related_produit)

						@include('elements.same-cat-product')

				@endforeach

			</div>
		</div>
		<div class="selected-product">
			<div class="row">
				<h3 class="selected-product-title">Produits sélectionnés pour vous</h3>
				@foreach ($new_produits as $new_produit)

					@include('elements.new-product')

				@endforeach
			</div>
		</div>
		<div class="comment-product" id="comment">
			<div class="row">

				<h3 class="comment-product-title">Avis des clients</h3>
				<div class="avis-slider col-xs-12">
					@if($avis->count())
						@foreach($avis as $review)
							<div>
								@include('elements.comment')
							</div>
						@endforeach
					@else
						<p>Il y a pas d'avis sur ce produit</p>
					@endif
				</div>

			</div><!-- End Row -->
		</div>
	</div>
</div>

<script>
	$('.avis-slider').slick({
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 3,
		nextArrow: '<i class="button-right fa fa-caret-right fa-2x"></i>',
		prevArrow: '<i class="button-left fa fa-caret-left fa-2x"></i>',
	});

	$(document).ready(function() {
		$('p.reviews a').on('click', function() { // Au clic sur un élément
			var page = $(this).attr('href'); // Page cible
			var speed = 750; // Durée de l'animation (en ms)
			$('html, body').animate( { scrollTop: ($(page).offset().top)-80 }, speed ); // Go
			return false;
		});
	});
</script>


<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-577a29a7cf56b67c"></script>

@endsection

