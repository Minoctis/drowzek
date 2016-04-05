@extends('layouts.checkout')

@section('title', 'Connexion')

@section('page-id', 'login')

@section('content')

<div class="container">
	<div class="login-page">
		<div class="title-content-login">
			<h1>Se connecter</h1>
		</div>
		<div class="social-account-content">
			<p>Inscrivez-vous en passant par les réseaux sociaux !</p>
			
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
			</div>

		</div>

		<span class="divider-or">ou</span>

		<div class="login-content">
			<form class="login-form">	

				<!-- Adresse email -->
				<div class="form-group">
					<label for="email">Adresse e-mail <span>*</span> </label>
					<input id="email" name="email" type="email"></input>
				</div>

				<!-- Mot de passe -->
				<div class="form-group">
				<label for="password">Mot de passe <span>*</span></label>
					<input id="password" name="password" type="password"></input>
				</div>

				<!-- Bouton se connecter -->
				<div class="form-group submit-button">
					<input class="hdg-button-small" id="submit" name="submit" type="submit" value="Se connecter" />
				</div>	

			</form>
		</div>

		<hr class="divider"></hr>

		<div class="create-account-content">
			<p>Vous n'avez pas de compte ? Créez en un par <a href="#">ici</a> </p>
		</div>

	</div>
</div>
@endsection