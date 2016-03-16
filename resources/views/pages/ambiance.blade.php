@extends('layouts.default')

@section('title', 'Page d\'accueil')

@section('content')

<div class="container">
	<div class="liste_ambiance">
		<div class="row">
			<!-- élément principal ambiance -->
			@include('elements.ambiance-header')
		</div>
		<div class="row">
			<!-- éléments secondaires ambiance -->
			@for ($i = 0; $i < 4; $i++)

		    	@include('elements.ambiance-sub')
		    
		    @endfor
		</div>
	</div>
</div>

@endsection