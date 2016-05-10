@extends('layouts.checkout')

@section('title', 'Créer un compte ')

@section('page-id', 'create-account')

@section('content')
<div class="container">
	<div class="create-account-page">
		<div class="title-content-create-account">
			<h1>Créer un compte</h1>
		</div>
		<div class="social-account-content">
			<p>Facilitez-vous la tâche en créant un compte via un réseau social. Vous n'aurez plus besoin de se souvenir d'un nouveau mot de passe</p>

			<p class="email-account" >Si vous voulez créer un compte classique, cliquez <a data-toggle="collapse" data-target="#create-account-with-email" >ici</a> ou sur l'icône "e-mail"</p>
			
			<div class="social">
				<div class="fb social-icon">
					<a href="#">
						<i class="fa fa-facebook"></i> <br>
						<span>Facebook</span>
					</a>
				</div>
				<div class="twitter social-icon">
					<a href="#">
						<i class="fa fa-twitter"></i> <br>
						<span>Twitter</span>
					</a>
				</div>
				<div class="google-plus social-icon">
					<a href="#">
						<i class="fa fa-google-plus"></i> <br>
						<span>Google+</span>
					</a>
				</div>
				<div class="email social-icon">
					<a data-toggle="collapse" data-target="#create-account-with-email" >
						<i class="fa fa-envelope-o"></i> <br>
						<span>E-mail</span>
					</a>
				</div>
			</div>

			
			
			<p class="cgv">En créant un compte, vous acceptez les <a href="#">Conditions générale de vente</a></p>

		</div>




		<div id="create-account-with-email" class="create-account-content collapse {{ $errors->all() ? 'in': '' }}">

			<hr class="divider">
			
			<form class="create-account-form" method="post">
				{!! csrf_field() !!}

				<!-- Civilité -->
				<div class="form-group">
				    <label >Titre</label>
					@foreach($errors->get('civilite') as $error)
						<p class="bg-danger">{{ $error }}</p>
					@endforeach
					<input id="civilite-mr" name="civilite" type="radio" value="1"/> <span>Mr.</span>
					<input id="civilite-mme" name="civilite" type="radio" value="2"/> <span>Mme</span>
				</div>
								
								
				<!-- Prénom -->
				<div class="form-group">
					@foreach($errors->get('prenom') as $error)
						<p class="bg-danger">{{ $error }}</p>
					@endforeach
					<label for="prenom">Prénom <span>*</span></label>
					<input class="form-control" class="form-control" id="prenom" name="prenom" type="text">
				</div>

				<!-- Nom -->
				<div class="form-group">
					@foreach($errors->get('nom') as $error)
						<p class="bg-danger">{{ $error }}</p>
					@endforeach
					<label for="nom">Nom <span>*</span></label>
					<input class="form-control" id="nom" name="nom" type="text">
				</div>

				<!-- Adresse email -->
				<div class="form-group">
					@foreach($errors->get('email') as $error)
						<p class="bg-danger">{{ $error }}</p>
					@endforeach
					<label for="email">Adresse e-mail <span>*</span> </label>
					<input class="form-control" id="email" name="email" type="email">
				</div>

				<!-- Date de naissance -->
				<div class="form-group">
					@foreach($errors->get('date-naissance') as $error)
						<p class="bg-danger">{{ $error }}</p>
					@endforeach
					<label for="date">Date de naissance </label>
					<input class="form-control" id="date" name="date-naissance" type="date">
				</div>

				<!-- Nouveau mot de passe-->
				<div class="form-group">
					@foreach($errors->get('password') as $error)
						<p class="bg-danger">{{ $error }}</p>
					@endforeach
					<label for="password">Mot de passe<span>*</span> </label>
					<input class="form-control" id="password" name="password" type="password">
					<p class="help-block">6 caractères minimum.</p>
				</div>	

				<!-- Confirmation du mot de passe-->
				<div class="form-group">
					<label for="password-confirm">Confirmer votre nouveau mot de passe <span>*</span> </label>
					<input class="form-control" id="password-confirm" name="password_confirmation" type="password">
				</div>								

				<!-- Newsletter -->
				<div class="form-group">
					<input type="hidden" name="newsletter" value="0">
					<input id="check-newsletter" name="newsletter" type="checkbox" value="1"/>
					<label for="check-newsletter"> J'aimerais m'abonner à la newsletter de Home de goût.com</label>
				</div>	
				

				<!-- Bouton valider -->
				<div class="form-group submit-button">
					<input class="hdg-button-small" id="submit" name="submit" type="submit" value="Créer un compte" />
				</div>	

			</form>
		</div>

		<hr class="divider">

		<div class="login-content">
			<p>Vous avez déjà un compte ? connectez-vous par <a href="{{ route('connexion') }}">ici</a> </p>
		</div>

	</div>
</div>
@endsection