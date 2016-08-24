@extends('layouts.default')

@section('title', 'Page d\'accueil')

@section('page-id', 'fiche-ambiance')

@section('breadcrumbs')
	<li><a href="{{ route('ambiances::liste') }}">Ambiances</a></li>
	<li class="active">{{ $ambiance->nom }}</li>
@endsection

@section('content')
<div class="container">
	<div class="fiche-ambiance">
		<div class="ambiance-header col-xs-12">
			<div class="col-md-4 col-xs-12">
				@if($prev_ambiance)
				<h2 class="autre-ambiance"><a href="{{ route('ambiances::fiche',$prev_ambiance->slug) }}" class="prev-ambiance" alt="{{ $prev_ambiance->nom }}" title="{{ $prev_ambiance->nom }}"><i class="fa fa-chevron-left"></i> {{ $prev_ambiance->nom }}</a></h2>
				@endif
			</div>
			<div class="col-md-4 col-xs-12">
				<h1 class="titre-ambiance">{{ $ambiance->nom }}</h1>
			</div>
			<div class="col-md-4 col-xs-12">
				@if($next_ambiance)
				<h2 class="autre-ambiance"><a href="{{ route('ambiances::fiche',$next_ambiance->slug) }}" class="next-ambiance" alt="{{ $next_ambiance->nom }}" title="{{ $next_ambiance->nom }}">{{ $next_ambiance->nom }} <i class="fa fa-chevron-right"></i></a></h2>
				@endif
			</div>
		</div>
		<div class="row border-ambiance padding-header">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-images slider-ambiances">
				<div class="align-bottom bloc-images">
					<div class="carousel slide article-slide" id="myCarousel-ambiance">
						<!-- Indicators -->
						<div class="carousel-indicators-wrapper">
							<ol class="carousel-indicators">
								@if ($ambiance->images->count() === 0)
									<li data-target="#myCarousel-ambiance" data-slide-to="0" class="active">
										<img alt="" title="" src="http://placehold.it/170x150/999999/cccccc" alt="{{ $ambiance->nom }}" title="{{ $ambiance->nom }}">
									</li>
								@endif
								@foreach($ambiance->images as $index => $image)
								<li data-target="#myCarousel-ambiance" data-slide-to="{{ $index }}"{{ $index === 0 ? ' class="active"' : '' }}>
									<img alt="" title="" src="/img/ambiances/{{ $image->img_name }}" alt="{{ $ambiance->nom }}" title="{{ $ambiance->nom }}">
								</li>
								@endforeach
							</ol>							
						</div>

						<!-- slider -->
				     	<div class="carousel-inner " role="listbox">
				     		<!-- Item 1 -->
							@if ($ambiance->images->count() === 0)
								<div class="item active">
									<div class="carousel-page">
										<img src="http://placehold.it/1200x600/999999/cccccc" class="img-responsive" style="margin:0px auto;"  alt="{{ $ambiance->nom }}" title="{{ $ambiance->nom }}" />
									</div>
									<div class="carousel-caption">
										<h5>{{ $ambiance->nom }}</h5>
										<p>{{ $ambiance->description }}</p>
									</div>
								</div>
							@endif
							@foreach($ambiance->images as $index => $image)
					        <div class="item{{ $index === 0 ? ' active' : '' }}">
								<div class="carousel-page">
									<img src="/img/ambiances/{{ $image->img_name }}" class="img-responsive" style="margin:0px auto;"  alt="{{ $ambiance->nom }}" title="{{ $ambiance->nom }}" />
								</div>
								<div class="carousel-caption">
									<h5>{{ $ambiance->nom }}</h5>
									<p>{{ $ambiance->description }}</p>
								</div>
							</div>  
							@endforeach
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

	<section class="produits-ambiance">
			<div class="row">
				@if($ambiance->produits->count() !== 0)
					@foreach($ambiance->produits as $index => $produit)
						@if($index === $rand_newsletter)
							@include('elements.bloc-newsletter')
						@endif
						@include('elements.new-product')
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