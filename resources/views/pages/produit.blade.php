@extends('layouts.default')

@section('title', 'Page d\'accueil')

@section('content')
<div class="row size-carousel">
	<div class="col-lg-6 col-xs-12 align-bottom">
			<div class="carousel slide article-slide" id="myCarousel">
		     	<div class="carousel-inner cont-slider">
			        <div class="item active">
			          <img class="img-products" src="{{ asset('img/products/fauteuil-panier.jpg')}}" width="100%" />
			        </div>
			        <div class="item">
			          <img src="http://placehold.it/1200x440/999999/cccccc">
			        </div>
			        <div class="item">
			          <img src="http://placehold.it/1200x440/dddddd/333333">
			        </div>               
		     	</div>
		      <!-- Indicators -->
		     	<ol class="carousel-indicators visible-lg visible-md">
			        <li class="active" data-slide-to="0" data-target="#myCarousel">
			          <img alt="" title="" src="http://placehold.it/120x44/cccccc/ffffff">
			        </li>
			        <li class="" data-slide-to="1" data-target="#myCarousel">
			          <img alt="" title="" src="http://placehold.it/120x44/999999/cccccc">
			        </li>
			        <li class="" data-slide-to="2" data-target="#myCarousel">
			          <img alt="" title="" src="http://placehold.it/120x44/dddddd/333333">
			        </li>               
		     	</ol>                 
		    </div>
	</div>
	<div class="col-lg-6 col-xs-12 padding-product showborder">
		<div class="row">
			<div class="col-xs-12 showborder">
				<h2>Craddle chair by Richard Clarkson</h2>
				<h3>Richard Clarkson</h3>
				<p>
					Designée par Richard Clarkson, Grace Emmanual, Brodie Campbell, 
					Jeremy Broker, Eamon Moore, Kahlivia Russell et Joya Boerrigter, 
					la Cradle Chair (« chaise berceau » en Anglais) est une rocking 
					chair visant l’apport de confort, de relaxation et de calme. 
					Sa conception s’appuie sur des recherches menées sur l’autisme 
					et la rythmie du sommeil. La Cradle Chair combine donc sécurité, 
					soutien et esthétique pour répondre aux besoins de toute personne 
					et de tout intérieur. Plus d’infos sur le site de Richard Clarkson.
				</p>
				<p>
					Dimensions :
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-xs-12">
				<p>
					Note des clients ayant acheté ce produit : 5/5 
				</p>
			</div>
			<div class="col-lg-6 col-xs-12">
				<p>
					<a href="#">Afficher les avis</a>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-xs-12">
				<p>
					Prix : 263 €
				</p>
			</div>
			<div class="col-lg-6 col-xs-12">
				<p><a href="#" class="btn btn-primary hdg-button-default button-add-basket" role="button">Ajouter au panier</a></p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="row">
					<div class="col-lg-12">
						Partagez sur les réseaux sociaux
					</div>
				</div>	
				<div class="row reseaux">
					<div class="col-lg-2 col-md-4 col-sm-4 col-xs-4 social-icons">
						<p>
							<a ref="#">
								<span style="color:#043861">
									<i class="fa fa-facebook"></i><br />
									Facebook
								</span>
							</a>
						</p>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-4 col-xs-4 social-icons">
						<p>
							<a ref="#">
								<span style="color:#307be1">
									<i class="fa fa-twitter"></i><br />
									Twitter
								</span>
							</a>
						</p>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-4 col-xs-4 social-icons">
						<p>
							<a ref="#">
								<span style="color:#ca0814">
									<i class="fa fa-google-plus"></i><br />
									Google +
								</span>
							</a>
						</p>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-4 col-xs-4 social-icons">
						<p>
							<a ref="#">
								<span style="color:#77400b">
									<i class="fa fa-instagram"></i><br />
									Instagram
								</span>
							</a>
						</p>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-4 col-xs-4 social-icons">
						<p>
							<a ref="#">
								<span style="color:#cd2c2f">
									<i class="fa fa-pinterest"></i><br />
									Pinterest
								</span>
							</a>
						</p>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-4 col-xs-4 social-icons">
						<p>
							<a ref="#">
								<span style="color:#650205">
									<i class="fa fa-youtube"></i><br />
									Youtube
								<span>
							</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="related-product">
		<div class="row">
			<h3>Produits dans la même catégorie</h3>
		    @for ($i = 0; $i < 4; $i++)

		    	@include('elements.product')
		    
		    @endfor
		</div>
	</div>
	<div class="selected-product">
		<div class="row">
			<h3>Produits sélectionnés pour vous</h3>
		    @for ($i = 0; $i < 4; $i++)

		    	@include('elements.product')
		    
		    @endfor
		</div>
	</div>
	<div class="comment-product">
		<div class="row">
			<h3>Avis des clients</h3>
		</div>
	</div>
</div>

@endsection