@extends('layouts.default')

@section('title', 'Page d\'accueil')

@section('content')
<div class="container">
	<div class="carousel slide article-slide" id="myCarousel">
      <div class="carousel-inner cont-slider">
    
        <div class="item active">
          <img src="http://placehold.it/1200x600/cccccc/ffffff">
        </div>
        <div class="item">
          <img src="http://placehold.it/1200x600/999999/cccccc">
        </div>
        <div class="item">
          <img src="http://placehold.it/1200x600/dddddd/333333">
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
@endsection