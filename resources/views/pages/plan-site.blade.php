@extends('layouts.default')

@section('title', 'plan-site')

@section('page-id', 'plan-site')

@section('breadcrumbs')
    <li class="active">plan du site</li>
@endsection

@section('content')
	<div class="page-static">
		<div class="entete-page">
			<img src="{{ asset('img/themes/header-compte.jpg') }}" class="img img-reponsive" alt="Mon Compte">
			<h1 class="page-title">Plan du site</h1>
		</div>


		<div class="container">
			<div class="row">
				<h3><a href="{{ route('accueil') }}">Accueil</a></h3>
			</div>
			<div class="row">
				<h3>Catégories</h3>
				<!-- listing catégories -->
				@foreach($categories as $categorie)
					<li class="col-sm-6 col-md-2 categorie {{ $categorie->slug }}">
						<ul>
							<li class="dropdown-header">
								<a href="{{ route('creations', ['slug' => $categorie->slug]) }}">{{ $categorie->nom }}</a>
							</li>
							@foreach($categorie->children as $sous_categorie)
								<li class="sous-dropdown-header">
									<a href="{{ route('creations', ['slug' => $sous_categorie->slug]) }}">{{ $sous_categorie->nom }}</a>
								</li>
							@endforeach
						</ul>
					</li>
				@endforeach
			</div>
			<div class="row">
				<h3>
					<a href="{{ route('ambiances::liste') }}">Ambiances</a>
				</h3>
				<!-- éléments secondaires ambiance -->
				<ul>
					@foreach ($ambiances as $ambiance)
						<li class="sous-dropdown-header">
							<a href="{{ route('ambiances::fiche', $ambiance->slug) }}" alt="{{ $ambiance->nom }}" title="{{ $ambiance->nom }}">
								{{ $ambiance->nom }}
							</a>
						</li>
					@endforeach
				</ul>
				
				<p>
					<h3><a href="{{ route('panier') }}">Panier</a></h3>
				</p>
				<p>
					<h3><a href="{{ route('cgv') }}" alt="Conditions générales de vente" title="Conditions générales de vente">
						Conditions générales de vente
					</a></h3>
				</p>
				<p>
					<h3><a href="{{ route('livraison') }}" alt="Livraison" title="Livraison">Livraison</a><br /></h3>
				</p>
				<p>
					<h3><a href="{{ route('garantie') }}" alt="Garanties" title="Garanties">Garanties</a><br /></h3>
				</p>
			</div>
		</div>
	</div>
@endsection