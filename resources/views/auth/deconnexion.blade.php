@extends('layouts.default')

@section('title', 'Déconnexion')

@section('page-id', 'logout')

@section('breadcrumbs')
	<li class="active">Déconnexion</li>
@endsection

@section('content')
	<div class="logout">
		<div class="entete-page">
			<img src="{{ asset('img/themes/header-compte.jpg') }}" class="img img-reponsive" alt="Mon Compte">
			<h1 class="page-title">Déconnexion</h1>
		</div>

		<div class="container">
			<div class="logout-page">
				<div class="title-content-login">
					<h1>Déconnexion</h1>
				</div>
				<p>Vous allez etre rediriger vers la page d'accueil dans 5sec.</p>

				<script>
					window.setTimeout(function() {
						window.location.href = '/';
					}, 5000);
				</script>
			</div>
		</div>
	</div>
@endsection