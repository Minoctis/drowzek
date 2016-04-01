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
				     	<div class="carousel-inner cont-slider">
					        <div class="item active">
					          	<img src="http://placehold.it/1200x500/cccccc/ffffff">

					        </div>
					        <div class="item">
					          	<img src="http://placehold.it/1200x400/999999/cccccc">

					        </div>
					        <div class="item">
					          	<img src="http://placehold.it/1100x500/dddddd/333333">

					        </div>               
				     	</div>
				    	<!-- Indicators -->
				    	<ol class="carousel-indicators visible-lg visible-md">
				    		<div class="ambiance">
				    			
				    		</div>
				    		<div class="indicator">
				    			<li class="active" data-slide-to="0" data-target="#myCarousel-ambiance">
								<img alt="" title="" src="http://placehold.it/160x150/cccccc/ffffff">
								</li>
								<li class="" data-slide-to="1" data-target="#myCarousel-ambiance">
									<img alt="" title="" src="http://placehold.it/170x150/999999/cccccc">
								</li>
								<li class="" data-slide-to="2" data-target="#myCarousel-ambiance">
									<img alt="" title="" src="http://placehold.it/150x150/dddddd/333333">
								</li>         
				    		</div>
							      
						</ol>
				    </div>
				</div>
			</div>
		</div>
	</div>
	<section>
			<div class="row">
				@if(!empty($ambiance['produits']))
					@foreach($ambiance['produits'] as $produit)
	{{--				 @for($i = 0; $i < 12; $i++)--}}
						@include('elements.product')
					{{--@endfor--}}
					@endforeach
				@else
					<div class="col-xs-12">
						<p>Désolé, cette ambiance ne contient pas de produits pour le moment.</p>
					</div>
				@endif
			</div>
		</div>	
	</section>
</div>
@endsection