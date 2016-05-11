<ol class="breadcrumb liste-creation">
	@if ($categorie->children->count() !== 0)
		@foreach($categorie->children as $categorie_enfant)
	<li><a href="{{ route('creations', $categorie_enfant->slug) }}">{{ $categorie_enfant->nom }}</a>
		@endforeach
	@endif
</ol>