@extends('layouts.checkout')

@section('title', 'Étape 1 : Identification')

@section('page-id', 'checkout-identification')

@section('content')

<div class="container">
	<div class="checkout-panel">
		<div class="checkout-header">
			<ul class="nav nav-pills nav-justified nav-checkout">
				<li role="presentation" class="active">Identification</li>
				<li role="presentation">Adresses</li>
				<li role="presentation">Livraison</li>
				<li role="presentation">Paiement</li>
				<li role="presentation">Confirmation</li>
			</ul>
		</div>

		<div class="checkout-content-panel">
			<div class="row">
				<div class="col-md-7 col-xs-12 checkout-left-content">

					<div class="checkout-create-account">
						<div class="title-checkout-panel">
							<h3>Vous n'avez pas de compte ? Inscrivez-vous !</h3>
						</div>

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


						<div id="create-account-with-email" class="create-account-content collapse">

							<form class="create-account-form" method="post" action="{{ url('creation-compte') }}">
								{!! csrf_field() !!}

										<!-- Civilité -->
								<div class="form-group">
									<label class="label-civilite">Titre</label>
									@foreach($errors->get('civilite') as $error)
										<p class="bg-danger">{{ $error }}</p>
									@endforeach
									<div class="bloc-civilite">
										<input id="civilite-mr" name="civilite" type="radio" value="1"/> <span>Mr.</span>
									</div>
									<div class="bloc-civilite">
										<input id="civilite-mme" name="civilite" type="radio" value="2"/> <span>Mme</span>
									</div>

								</div>


								<!-- Prénom -->
								<div class="form-group">
									@foreach($errors->get('prenom') as $error)
										<p class="bg-danger">{{ $error }}</p>
									@endforeach
									<label for="prenom">Prénom <span>*</span></label>
									<input class="form-control" id="prenom" name="prenom" type="text">
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
					</div>
					

					<p class="cgv">En créant un compte, vous acceptez les <a href="#">Conditions générale de vente</a></p>

					<hr class="divider">

					<div class="checkout-login">

						<div class="title-checkout-panel">
							<h3>Déjà inscrit ? <a data-toggle="collapse" data-target="#checkout-login" >Se connecter !</a></h3>
						</div>

						<div id="checkout-login" class="collapse">
							<form class="login-form" role="form" method="POST" action="{{ url('/connexion') }}">
								{!! csrf_field() !!}
										<!-- Adresse email -->
								<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
									<label for="email">Adresse e-mail <span>*</span> </label>
									<input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}">

									@if ($errors->has('email'))
										<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
									@endif
								</div>

								<!-- Mot de passe -->
								<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
									<label for="password">Mot de passe <span>*</span></label>
									<input class="form-control" id="password" name="password" type="password">
									@if ($errors->has('password'))
										<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
									@endif
								</div>

								<div class="form-group">
									<div class="checkbox">
										<label><input type="checkbox" name="remember"> Se souvenir de moi</label>
									</div>
								</div>

								<!-- Bouton se connecter -->
								<div class="form-group submit-button">
									<input class="hdg-button-small" id="submit" name="submit" type="submit" value="Se connecter" />
								</div>

							</form>
						</div>
						
					</div>	
					


				</div>

				<div class="col-md-5 col-xs-12 checkout-right-content recap-panier">
{{--					@include('elements.checkout-mini-panier')--}}
				</div>

			</div>
		</div>
	</div>

</div>

@endsection