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
								<img src="http://placehold.it/1000x1000/999999/cccccc">
							</div>
						@endif
						@foreach($produit->images as $key => $image)
							<div class="item{{ $key === 0 ? ' active' : '' }}">
								<img src="/img/products/{{$image->img_name}}">
							</div>
						@endforeach
			     	</div>
			      <!-- Indicators -->
			     	<ol class="carousel-indicators visible-lg visible-md">
						@if($produit->images->count() === 0)
							<li class="active" data-slide-to="0" data-target="#myCarousel">
								<img src="http://placehold.it/1000x1000/999999/cccccc">
							</li>
						@endif
						@foreach($produit->images as $key => $image)
							<li {{ $key === 0 ? 'class="active"' : '' }} data-slide-to="{{ $key }}" data-target="#myCarousel">
								<img src="/img/products/{{$image->img_name}}">
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
					Note des clients ayant acheté ce produit : 5/5, <a href="#comment">Afficher les avis</a>
				</p>			
				<div class="row">
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
				@for ($i = 0; $i < 4; $i++)

					@include('elements.same-cat-product')

				@endfor
			</div>
		</div>
		<div class="selected-product">
			<div class="row">
				<h3 class="selected-product-title">Produits sélectionnés pour vous</h3>
				@for ($i = 0; $i < 4; $i++)

					@include('elements.related-product')

				@endfor
			</div>
		</div>
		<div class="comment-product" id="comment">
			<div class="row">
				<h3 class="comment-product-title">Avis des clients</h3>
				<div style="float:right;">
					<a class="left carousel-control-comment" href="#myCarousel-comment" data-slide="prev"><i class="fa fa-caret-left fa-2x"></i></a>
					<a class="right carousel-control-comment" href="#myCarousel-comment" data-slide="next"><i class="fa fa-caret-right fa-2x"></i></a>
				</div>

				<div class="well">
					<!-- Carousel
                    ================================================== -->
					<div id="myCarousel-comment" class="carousel slide" data-interval="false">
						<div class="carousel-inner">
							<div class="item active">
								<div class="row">
									@for ($i = 0; $i < 3; $i++)
										@include('elements.comment')
									@endfor
								</div>
							</div>
							<div class="item">
								<div class="row">
									@for ($i = 0; $i < 3; $i++)
										@include('elements.comment')
									@endfor
								</div>
							</div>
							<div class="item">
								<div class="row">
									@for ($i = 0; $i < 3; $i++)
										@include('elements.comment')
									@endfor
								</div>
							</div>
						</div>
						<!--
                        <ol class="carousel-indicators-comment">
                            <li data-target="#myCarousel-comment" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel-comment" data-slide-to="1"></li>
                            <li data-target="#myCarousel-comment" data-slide-to="2"></li>
                        </ol>
                        -->
					</div><!-- End Carousel -->
				</div><!-- End Well -->
			</div><!-- End Row -->
		</div>
	</div>
</div>


<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-577a29a7cf56b67c"></script>

@endsection

