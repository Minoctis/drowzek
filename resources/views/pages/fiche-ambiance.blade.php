@extends('layouts.default')

@section('title', 'Page d\'accueil')

@section('page-id', 'fiche-ambiance')

@section('content')
<div class="container">
	<div class="fiche-ambiance">
		<div class="row border-ambiance padding-header">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-images slider-ambiances">
				<div class="align-bottom bloc-images">
					<div class="carousel slide article-slide" id="myCarousel-ambiance">
						<!-- Indicators -->
						<div class="carousel-indicators-wrapper">
							<ol class="carousel-indicators">
								<li data-target="#myCarousel-ambiance" data-slide-to="0" class="active">
									<img alt="" title="" src="http://placehold.it/160x150/cccccc/ffffff">
								</li>
								<li data-target="#myCarousel-ambiance" data-slide-to="1">
									<img alt="" title="" src="http://placehold.it/170x150/999999/cccccc">
								</li>
								<li data-target="#myCarousel-ambiance" data-slide-to="2">
									<img alt="" title="" src="http://placehold.it/150x150/dddddd/333333">
								</li>
							</ol>							
						</div>

						<!-- slider -->
				     	<div class="carousel-inner " role="listbox">
				     		<!-- Item 1 -->
					        <div class="item active"> 
								<div class="carousel-page">
									<img src="http://placehold.it/1200x500/cccccc/ffffff" class="img-responsive" style="margin:0px auto;"  />
								</div> 
								<div class="carousel-caption">
									<h5>Moderne</h5>
									<p>
										Retrouvez une gamme de produit d'ambiance moderne !
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
									</p>
								</div>
							</div>  

					        <!-- Item 2 -->
							<div class="item"> 
								<div class="carousel-page">
									<img src="http://placehold.it/1200x400/999999/cccccc" class="img-responsive" style="margin:0px auto;"  />
								</div> 
								<div class="carousel-caption">
									<h5>Moderne</h5>
									<p>
										Retrouvez une gamme de produit d'ambiance moderne !
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
									</p>
								</div>
							</div> 
					        <!-- item 3 -->
					        <div class="item"> 
								<div class="carousel-page">
									<img src="http://placehold.it/1100x500/dddddd/333333" class="img-responsive" style="margin:0px auto;"  />
								</div> 
								<div class="carousel-caption">
									<h5>Moderne</h5>
									<p>
										Retrouvez une gamme de produit d'ambiance moderne !
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
									</p>
								</div>
							</div>              
				     	</div>



						<!-- Controls -->
					  	<a class="left carousel-control" href="#myCarousel-ambiance" role="button" data-slide="prev">
					    	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    	<span class="sr-only">Previous</span>
					  	</a>
					  	<a class="right carousel-control" href="#myCarousel-ambiance" role="button" data-slide="next">
					    	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    	<span class="sr-only">Next</span>
					  	</a>
				    </div>
				</div>
			</div>
		</div>
	</div>

	<section>
			<div class="row">
				{{--@foreach($ambiance->produits as $produit)--}}
				 @for($i = 0; $i < 12; $i++)
			    	@include('elements.product')
			    @endfor
			    {{--@endforeach--}}
			</div>
		</div>	
	</section>
</div>
@endsection