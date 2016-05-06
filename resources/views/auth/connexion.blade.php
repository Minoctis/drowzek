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
			<form class="login-form" role="form" method="POST" action="{{ url('/connexion') }}">
				{!! csrf_field() !!}
				<!-- Adresse email -->
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email">Adresse e-mail <span>*</span> </label>
					<input id="email" name="email" type="email" value="{{ old('email') }}">

					@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>

				<!-- Mot de passe -->
				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				<label for="password">Mot de passe <span>*</span></label>
					<input id="password" name="password" type="password">
					@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="remember"> Se souvenir de moi
							</label>
						</div>
					</div>
				</div>

				<!-- Bouton se connecter -->
				<div class="form-group submit-button">
					<input class="hdg-button-small" id="submit" name="submit" type="submit" value="Se connecter" />
				</div>	

			</form>
		</div>

		<hr class="divider">

		<div class="create-account-content">
			<p>Vous n'avez pas de compte ? Créez en un par <a href="{{ route('creation-compte') }}">ici</a> </p>
		</div>

	</div>
</div>
@endsection