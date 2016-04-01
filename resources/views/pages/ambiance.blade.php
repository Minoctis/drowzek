@extends('layouts.default')

@section('title', 'Page d\'accueil')

@section('page-id', 'ambiance')

@section('breadcrumbs')
	<li class="active">Ambiances</li>
@endsection

@section('content')

<div class="container">
	<div class="liste_ambiance">
		<div class="row">
			<!-- élément principal ambiance -->
			@include('elements.ambiance-header')
		</div>
		<div class="row">
			<!-- éléments secondaires ambiance -->
			@foreach ($ambiances as $index => $ambiance)
				@if ($index == 0)
					@continue
				@endif
		    	@include('elements.ambiance-sub')
		    
		    @endforeach
		</div>
	</div>
</div>

@endsection