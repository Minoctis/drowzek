

@extends('layouts.front')

@section('title', 'Page d\'accueil')

@section('page-id', 'hp')

@section('content')

	<!-- SLIDER -->
	<div class="slider-hp">
        <img src="{{ asset('img/themes/slider/slide3.jpg') }}" alt="">

    </div> 
    <!-- FIN SLIDER -->

    <!-- BEGIN NOUVEAUTES -->
	<div class="nouveautes">
		<h1 class="title">Nouveauté</h1>
	    <div class="container">
			<div class="row">
			    @foreach ($new_produits as $new_produit)

			    	@include('elements.new-product')
			    
			    @endforeach
			</div>
		</div>
	</div>
	<!--  FIN NOUVEUTES -->

    <!-- Les ambiances -->
	<div class="ambiance row">
	    <div class="container">
	        <h1 class="title">Les ambiances</h1>
	        <h3 class="sub-title">Chaque mois, on vous propose une sélection d'ambiances de la saison</h3>
	        <hr>
	        <div class="content">
	           <div class="row">
				   @if (isset($top_ambiances[0]))
	                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ambiance1">
	                   <div class="ambiance-content">
	                       <img src="{{ isset($top_ambiances[0]->images[0]) ? '/img/ambiances/'.$top_ambiances[0]->images[0]->img_name : 'http://placehold.it/540x500' }}" alt="{{ $top_ambiances[0]->nom }}" title="{{ $top_ambiances[0]->nom }}">
	                       <div class="ambiance-text">
	                           <div class="ambiance-name">{{ $top_ambiances[0]->nom }}</div>
	                           <div class="ambiance-desc">
								   {{ $top_ambiances[0]->description }}
							   </div>
	                           <div class="ambiance-view">
	                               <a href="{{ route('ambiances::fiche', $top_ambiances[0]->slug) }}" class="hdg-button-default" alt="{{ $top_ambiances[0]->nom }}" title="{{ $top_ambiances[0]->nom }}">Voir l'ambiance</a>
	                           </div>                           
	                       </div>
	                   </div>
	                </div>
				   @endif
				   @if (isset($top_ambiances[1]))
	                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	                    <div class="row ambiance2">
	                       <div class="ambiance-content">
							   <img src="{{ isset($top_ambiances[1]->images[0]) ? '/img/ambiances/'.$top_ambiances[1]->images[0]->img_name : 'http://placehold.it/540x500' }}" alt="{{ $top_ambiances[1]->nom }}" title="{{ $top_ambiances[1]->nom }}">
	                           <div class="ambiance-text">
	                               <div class="ambiance-name">{{ $top_ambiances[1]->nom }}</div>
	                               <div class="ambiance-desc">
									   {{ $top_ambiances[1]->description }}
								   </div>
	                               <div class="ambiance-view">
	                                   <a href="{{ route('ambiances::fiche', $top_ambiances[1]->slug) }}" class="hdg-button-default" alt="{{ $top_ambiances[1]->nom }}" title="{{ $top_ambiances[1]->nom }}">Voir l'ambiance</a>
	                               </div>                               
	                           </div>       
	                       </div>
	                    </div>
						@endif
						@if (isset($top_ambiances[2]))
	                    <div class="row ambiance3">
	                       <div class="ambiance-content">
							   <img src="{{ isset($top_ambiances[2]->images[0]) ? '/img/ambiances/'.$top_ambiances[2]->images[0]->img_name : 'http://placehold.it/540x500' }}" alt="">
	                           <div class="ambiance-text">
	                               <div class="ambiance-desc">
									   <div class="ambiance-name">{{ $top_ambiances[2]->nom }}</div>
									   {{ $top_ambiances[2]->description }}
	                               </div>
	                               <div class="ambiance-view">
	                                   <a href="{{ route('ambiances::fiche', $top_ambiances[2]->slug) }}" class="hdg-button-default">Voir l'ambiance</a>
	                               </div>                               
	                           </div>
	                       </div>
	                    </div>
						@endif
	                </div>
	            </div>
	        </div>
	        <h3 class="show-ambiances"><a href="{{ route('ambiances::liste') }}">Voir toutes les ambiances</a></h3>
	    </div>  
	</div> <!-- Fin du bloc ambiances -->



    <!-- Les opportnités -->
	<div class="opportunity">
		<div class="opp-image">
			<img class="opportunity-img" src="{{ asset('img/themes/opportunite.jpg') }}" alt="">
		</div>

		<div class="container">
		    <!--h1 class="title">Opportunité exeptionnelle</h1>
		    <h3 class="sub-title">Votre canapé à personnaliser selon vos envie</h3>
		    <span>Couleur</span>
		    <span>Dimension</span>
		    <span>Matière</span-->
		    
		    <div class="opportunity-content">
		    	<div class="row">
		    		<div class="col-md-6 col-xs-12">
		    			<p>Restez informé des nouvelles opportunités</p>
		    			<input class="hdg-input-default" type="text" placeholder="Votre adresse email"></input>
		    			<button class="hdg-button-small">Valider</button>
		    		</div>
		    	</div>	
		    </div>		
		</div>

	</div> <!-- Fin du bloc des opportnités -->

	<!-- Les actualités -->
	<div class="actualites">
		<div class="container">
			<div class="col-md-6">
				<div class="thumbnail news">
					<div class="image-news">
						<img src="{{ asset('img/news/news3.jpeg') }}">
					</div>
			      <div class="caption">
			        <h3 class="news-title">Nouvelle collection bientôt sur notre site</h3>
			        <p>
			        	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...
			        </p>
			        <p><a href="#" class="news-show" role="button">Lire la suite</a></p>
			      </div>
			    </div>
			</div>
			<div class="col-md-3">
				<div class="thumbnail news">
					<div class="image-news">
						<img src="{{ asset('img/news/news1.jpeg') }}">
					</div>
			      <div class="caption">
			        <h3 class="news-title">on parle de nous !</h3>
			        <p>
			        	Lorem ipsum dolor sit amet, consectetur adipisicing elit...
			        </p>
			        <p><a href="#" class="news-show" role="button">Lire la suite</a></p>
			      </div>
			    </div>
			</div>
			<div class="col-md-3">
				<div class="thumbnail news">
					<div class="image-news">
						<img src="{{ asset('img/news/news2.jpeg') }}">
					</div>
			      <div class="caption">
			        <h3 class="news-title">Comment décorer votre salon?</h3>
			        <p>
			        	Lorem ipsum dolor sit amet, consectetur adipisicing elit...
			        </p>
			        <p><a href="#" class="news-show" role="button">Lire la suite</a></p>
			      </div>
			    </div>
			</div>
		</div>
	</div> <!-- Fin du bloc des actualités -->


    
@endsection


