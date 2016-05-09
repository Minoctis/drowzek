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
		<div class="row border-ambiance padding-header">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 product-images slider-ambiances">
				<div class="align-bottom bloc-images">
					<div class="carousel slide article-slide" id="myCarousel-ambiance">
						<!-- Indicators -->
						<div class="carousel-indicators-wrapper">
							<ol class="carousel-indicators">
								@foreach($ambiance->images as $index => $image)
								<li data-target="#myCarousel-ambiance" data-slide-to="{{ $index }}"{{ $index === 0 ? ' class="active"' : '' }}>
									<img alt="" title="" src="/img/ambiances/{{ $image->img_name }}">
								</li>
								@endforeach
							</ol>							
						</div>

						<!-- slider -->
				     	<div class="carousel-inner " role="listbox">
				     		<!-- Item 1 -->
							@foreach($ambiance->images as $index => $image)
					        <div class="item{{ $index === 0 ? ' active' : '' }}">
								<div class="carousel-page">
									<img src="/img/ambiances/{{ $image->img_name }}" class="img-responsive" style="margin:0px auto;"  />
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

	<section>
			<div class="row">
				{{--@if(!empty($ambiance['produits']))--}}
					{{--@foreach($ambiance['produits'] as $produit)--}}
	{{--				 @for($i = 0; $i < 12; $i++)--}}
						{{--@include('elements.product')--}}
					{{--@endfor--}}
					{{--@endforeach--}}
				{{--@else--}}
					{{--<div class="col-xs-12">--}}
						{{--<p>Désolé, cette ambiance ne contient pas de produits pour le moment.</p>--}}
					{{--</div>--}}
				{{--@endif--}}
			</div>
		</div>	
	</section>
</div>
@endsection