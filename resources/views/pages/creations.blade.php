@extends('layouts.default')

@section('title', 'Créations - '.$categorie->nom)

@section('page-id', 'liste-produit')

@section('breadcrumbs')
	@if(isset($categorie->parent))
		<li><a href="{{ route('creations', $categorie->parent->slug) }}">{{ $categorie->parent->nom }}</a></li>
	@endif
	<li class="active">{{ $categorie->nom }}</li>
@endsection

@section('content')

<img src="{{ isset($categorie->img_name) ? '/img/categories/'.$categorie->img_name : 'http://placehold.it/1349x200' }}" class="img-creation"alt="image de la catégorie {{ $categorie->nom }}">
@if ($categorie->children->count() !== 0)
	@include('elements.nav-ambiance')
@endif
<div class="creation">
	
<div class="container">
	
	<div class="row">
		@if ($categorie->children->count() !== 0)
			<?php $index = 0; ?>
			@foreach($categorie->children as $categorie_enfant)
				@foreach($categorie_enfant->produits as $produit)
					 <?php ++$index; ?>
					@if($index === $rand_newsletter)
						@include('elements.bloc-newsletter')
					@endif
					@include('elements.new-product')
				@endforeach
			@endforeach
		@elseif($categorie->produits->count() !== 0)
			@foreach($categorie->produits as $index => $produit)
				@if($index === $rand_newsletter)
					@include('elements.bloc-newsletter')
				@endif
				@include('elements.new-product')

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