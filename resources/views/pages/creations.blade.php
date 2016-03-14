@extends('layouts.default')

@section('title', 'Page d\'accueil')

@section('content')

<div class="container">
	<div class="row">
	    @for ($i = 0; $i < 8; $i++)

	    	@include('elements.product')
	    
	    @endfor
	</div>
</div>

@endsection