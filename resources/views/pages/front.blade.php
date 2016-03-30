

@extends('layouts.front')

@section('title', 'Page d\'accueil')

@section('page-id', 'hp')

@section('content')

	<!-- SLIDER -->
	<div class="slider-hp">
        <img src="{{ asset('img/themes/slider/slide.png') }}" alt="">    
    </div> 
    <!-- FIN SLIDER -->

    <!-- BEGIN NOUVEAUTES -->
	<div class="nouveautes">
		<h1 class="title">Nouveauté</h1>
	    <div class="container">
			<div class="row">
			    @for ($i = 0; $i < 4; $i++)

			    	@include('elements.product')
			    
			    @endfor
			</div>
		</div>
	</div>
	<!--  FIN NOUVEUTES -->

    <!-- Les ambiances -->
	<div class="ambiance row">
	    <div class="container">
	        <h1 class="title">Les ambiances</h1>
	        <h3 class="sub-title">Chaque mois, on vous propose une sélection d'ambiance de la saison</h3>
	        <hr>
	        <div class="content">
	           <div class="row">
	                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ambiance1">
	                   <div class="ambiance-content">
	                       <img src="http://placehold.it/540x500" alt="">
	                       <div class="ambiance-text">
	                           <div class="ambiance-name">Ambiance</div>
	                           <div class="ambiance-desc">
	                               Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad                            minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
	                           </div>
	                           <div class="ambiance-view">
	                               <button class="hdg-button-default">Voir l'ambiance</button>
	                           </div>                           
	                       </div>

	                   </div>
	                </div>
	                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	                    
	                    <div class="row ambiance2">
	                       <div class="ambiance-content">
	                           <img src="http://placehold.it/540x240" alt="">
	                           <div class="ambiance-text">
	                               <div class="ambiance-name">Ambiance</div>
	                               <div class="ambiance-desc">
	                                   Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad                            minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
	                               </div>
	                               <div class="ambiance-view">
	                                   <button class="hdg-button-default">Voir l'ambiance</button>
	                               </div>                               
	                           </div>       
	                       </div>
	                    </div>
	                    
	                    <div class="row ambiance3">
	                       <div class="ambiance-content">
	                           <img src="http://placehold.it/540x240" alt="">
	                           <div class="ambiance-text">
	                               <div class="ambiance-name">Ambiance</div>
	                               <div class="ambiance-desc">
	                                   Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad                            minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
	                               </div>
	                               <div class="ambiance-view">
	                                   <button class="hdg-button-default">Voir l'ambiance</button>
	                               </div>                               
	                           </div>
	                       </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <h3 class="show-ambiances"><a href="#">Voir toutes les ambiances</a></h3>
	    </div>  
	</div> <!-- Fin du bloc ambiances -->



    <!-- Les opportnités -->
	<div class="opportunity">
	<img class="opportunity-img" src="http://placehold.it/1200x500" alt="">
		<div class="container">
		    <h1 class="title">Opportunité exeptionnelle</h1>
		    <h3 class="sub-title">Votre canapé à personnaliser selon vos envie</h3>
		    <span>Couleur</span>
		    <span>Dimension</span>
		    <span>Matière</span>
		    
		    <div class="opportunity-content">
		    	<div class="row"></div>
		    	<div class="row">
		    		<div class="col-md-6">
		    			<p>Restez informer de nouvelles opportunités</p>
		    			<input class="hdg-input-default" type="text" placeholder="Votre adresse email"></input>
		    			<button class="hdg-button-small">Valider</button>
		    		</div>
		    		<div class="col-md-6">
		    			<button class="hdg-button-default">Accéder à l'opportunité</button>
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
			      <img src="http://placehold.it/540x150">
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
			      <img src="http://placehold.it/255x150">
			      <div class="caption">
			        <h3 class="news-title">ça parle de nous</h3>
			        <p>
			        	Lorem ipsum dolor sit amet, consectetur adipisicing elit...
			        </p>
			        <p><a href="#" class="news-show" role="button">Lire la suite</a></p>
			      </div>
			    </div>
			</div>
			<div class="col-md-3">
				<div class="thumbnail news">
			      <img src="http://placehold.it/255x150">
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


