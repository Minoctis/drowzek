

@extends('layouts.front')

@section('title', 'Page d\'accueil')

@include('elements.nav')


@section('content')
    
    @include('elements.product')
    
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
	<div class="opportunity row">
	    <h1 class="title">Opportunité exeptionnelle</h1>
	    <h3 class="sub-title">Votre canapé à personnaliser selon vos envie</h3>
	    
	    <div class="opportunity-content">

	    </div>
	</div> <!-- Fin du bloc des opportnités -->

	<!-- Les actualités -->
	<div class="actualites">
		<div class="container">
			<p>ici les actualités</p>
		</div>
	</div> <!-- Fin du bloc des actualités -->


    
@endsection


