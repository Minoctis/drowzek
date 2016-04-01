<div class="col-lg-6 padding-sub">
	<div class="border-ambiance">
		<div class="see-ambiance-sub">
			<h2>{{ $ambiance['nom'] }}</h2>
			<p>
				{{ $ambiance['description'] }}
			</p>
			<a class="hdg-button-small ">
				Découvrir
			</a>
		</div>
		<img class="img-products" src="{{ isset($ambiance['image']) ? asset('img/ambiances/'.$ambiance['img']['img_name']) : 'http://placehold.it/1398x880/999999/cccccc' }}" width="100%" />
	</div>
</div>