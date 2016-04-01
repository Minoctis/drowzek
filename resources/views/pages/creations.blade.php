@extends('layouts.default')

@section('title', 'Créations - '.$categorie['nom'])

@section('page-id', 'liste-produit')

@section('content')

<img src="{{ isset($categorie['img_name']) ? '/img/categories/'.$categorie['img_name'] : 'http://placehold.it/1349x200' }}" class="img-creation"alt="image de la catégorie {{ $categorie['nom'] }}">
<div class="creation">
	

<div class="container">
	
	

	<div class="row">
		@if(!empty($categorie['produits']))
			@foreach($categorie['produits'] as $produit)

				@include('elements.product')

			@endforeach
		@else
			<div class="col-xs-12">
				<p>Désolé, cette catégorie ne contient pas de produits pour le moment.</p>
			</div>
		@endif
	</div>
</div>
</div>

@endsection