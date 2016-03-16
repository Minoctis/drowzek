@extends('layouts.default')

@section('title', 'Page d\'accueil')

@section('content')

<img src="http://placehold.it/1349x200" class="img-creation"alt="">
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