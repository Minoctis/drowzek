@extends('layouts.default')

@section('title', 'Créations - '.$categorie->nom)

@section('content')

<img src="{{ isset($categorie->img_name) ? '/img/categories/'.$categorie->img_name : 'http://placehold.it/1349x200' }}" class="img-creation"alt="image de la catégorie {{ $categorie->nom }}">
<div class="creation">
	

<div class="container">
	
	

	<div class="row">

	    @for ($i = 0; $i < 12; $i++)

	    	@include('elements.product')
	    
	    @endfor
	</div>
</div>
</div>

@endsection