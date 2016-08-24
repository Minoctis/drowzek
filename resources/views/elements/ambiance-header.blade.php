<div class="col-lg-12 padding-header">
	<div class="border-ambiance">
		<div class="see-ambiance-header">
			<h2>{{ $ambiances[0]->nom }}</h2>
			<p>
				{{ $ambiances[0]->description}}
			</p>
			
			<a href="{{ route('ambiances::fiche', $ambiances[0]->slug) }}" class="hdg-button-default" title="{{ $ambiances[0]->nom }}" alt="{{ $ambiances[0]->nom }}" >
				Découvrir
			</a>
		</div>
		<img class="img-products" src="{{ (isset($ambiances[0]->images[0])) ? asset('img/ambiances/'.$ambiances[0]->images[0]->img_name) : 'http://placehold.it/1398x880' }}"  title="{{ $ambiances[0]->nom }}" alt="{{ $ambiances[0]->nom }}" width="100%" />
	</div>
</div>