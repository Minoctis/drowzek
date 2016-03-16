@extends('layouts.default')

@section('title', 'Page d\'accueil')

@section('content')

<div class="fiche-produit">
	<div class="row size-carousel">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 product-images">
			<div class="align-bottom bloc-images">
				<div class="carousel slide article-slide" id="myCarousel">
			     	<div class="carousel-inner cont-slider">
				        <div class="item active">
				          <img class="img-products" src="{{ asset('img/products/fauteuil-panier.jpg')}}" width="100%" />
				        </div>
				        <div class="item">
				          <img src="http://placehold.it/560x560/999999/cccccc">
				        </div>
				        <div class="item">
				          <img src="http://placehold.it/560x560/dddddd/333333">
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
		</div>
		<div class="container">
			<div class="col-lg-6 col-md-6"></div>
			<div class="col-lg-6  col-md-6 col-sm-12 col-xs-12 ">
				<h2 class="product-title">Craddle chair by Richard Clarkson</h2>
				<p>Description :</p>
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
				<p class="reviews">
					Note des clients ayant acheté ce produit : 5/5, <a href="#comment">Afficher les avis</a>
				</p>			
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<p class="product-price">
							Prix : <strong>263 €</strong>
						</p>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<p><a href="#" class="btn btn-primary hdg-button-default button-add-basket" role="button">Ajouter au panier</a></p>
					</div>
				</div>	
				<div class="row">
					<div class="col-xs-12">
						<p class="share-content"><i class="fa fa-share-alt-square"></i> Partagez sur les réseaux sociaux</p> 
						<div class="social">
							<div class="fb social-icon">
								<a href="#">
									<i class="fa fa-facebook"></i> <br>
									<span>Facebooks</span>
								</a>
							</div>
							<div class="twitter social-icon">
								<a href="#">
									<i class="fa fa-twitter"></i> <br>
									<span>Twitter</span>
								</a>
							</div>
							<div class="google-plus social-icon">
								<a href="#">
									<i class="fa fa-facebook"></i> <br>
									<span>Google+</span>
								</a>
							</div>
							<div class="instagram social-icon">
								<a href="#">
									<i class="fa fa-instagram"></i> <br>
									<span>Instagram</span>
								</a>
							</div>
							<div class="pinterest social-icon">
								<a href="#">
									<i class="fa fa-pinterest"></i> <br>
									<span>Pinterest</span>
								</a>
							</div>
							<div class="youtube social-icon">
								<a href="#">
									<i class="fa fa-youtube"></i> <br>
									<span>Youtube</span>
								</a>
							</div>
						</div>
					</div>
				</div>		
			</div>		
		</div>
	</div>
</div>

<div class="container">
	<div class="related-product">
		<div class="row">
			<h3 class="related-product-title">Produits dans la même catégorie</h3>
		    @for ($i = 0; $i < 4; $i++)

		    	@include('elements.product')
		    
		    @endfor
		</div>
	</div>
	<div class="selected-product">
		<div class="row">
			<h3 class="selected-product-title">Produits sélectionnés pour vous</h3>
		    @for ($i = 0; $i < 4; $i++)

		    	@include('elements.product')
		    
		    @endfor
		</div>
	</div>
	<div class="comment-product" id="comment">
		<div class="row">
			<h3 class="comment-product-title">Avis des clients</h3>
			<div class="col-lg-offset-9 col-lg-3 align-right-indicators">
				<a class="left carousel-control-comment" href="#myCarousel-comment" data-slide="prev"><i class="fa fa-caret-left fa-2x"></i></a>
                <a class="right carousel-control-comment" href="#myCarousel-comment" data-slide="next"><i class="fa fa-caret-right fa-2x"></i></a>
			</div>
		</div>
		<div class="row">
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

@endsection