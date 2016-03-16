@extends('layouts.default')

@section('title', 'Page d\'accueil')

@section('content')

<div class="creation">
	<img src="http://placehold.it/1349x200" alt="">

<div class="container">
	
	

	<div class="row">

	    @for ($i = 0; $i < 12; $i++)

	    	@include('elements.product')
	    
	    @endfor
	</div>
</div>
</div>

@endsection