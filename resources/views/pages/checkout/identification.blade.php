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
				<div class="col-md-7 col-xs-12 checkout-left">

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
							
							<form class="create-account-form">	
			
								<!-- Adresse email -->
								<div class="form-group col-sm-6">
									<label for="email">Adresse e-mail <span>*</span> </label>
									<input id="email" name="email" type="email"></input>
								</div>

								<!-- Mot de passe -->
								<div class="form-group col-sm-6">
									<label for="password">Mot de passe <span>*</span></label>
									<input id="password" name="password" type="password"></input>
								</div>

								<!-- Bouton se connecter -->
								<div class="form-group submit-button col-sm-6 col-sm-offset-6">
									<input class="hdg-button-small" id="submit" name="submit" type="submit" value="Créer un compte" />
								</div>	

							</form>
						</div>
					</div>
					

					<p class="cgv">En créant un compte, vous acceptez les <a href="#">Conditions générale de vente</a></p>

					<hr class="divider"></hr>

					<div class="checkout-login row">

						<div class="title-checkout-panel">
							<h3>Déjà inscrit ? <a data-toggle="collapse" data-target="#checkout-login" >Se connecter !</a></h3>
						</div>

						<div id="checkout-login" class="collapse">
							<form class="login-form">	

								<!-- Adresse email -->
								<div class="form-group col-sm-6">
									<label for="email">Adresse e-mail <span>*</span> </label>
									<input id="email" name="email" type="email"></input>
								</div>

								<!-- Mot de passe -->
								<div class="form-group col-sm-6">
									<label for="password">Mot de passe <span>*</span></label>
									<input id="password" name="password" type="password"></input>
								</div>

								<!-- Bouton se connecter -->
								<div class="form-group submit-button col-sm-6 col-sm-offset-6">
									<input class="hdg-button-small" id="submit" name="submit" type="submit" value="Se connecter" />
								</div>	

							</form>
						</div>
						
					</div>	
					


				</div>

				<div class="col-md-5 col-xs-12">test</div>

			</div>
		</div>
	</div>

</div>

@endsection