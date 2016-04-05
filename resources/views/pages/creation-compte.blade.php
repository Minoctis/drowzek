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




		<div id="create-account-with-email" class="create-account-content collapse">

			<hr class="divider"></hr>
			
			<form class="create-account-form">	

				<!-- Civilité -->
				<div class="form-group">
				    <label >Titre</label>
					<input id="civilite" name="civilite" type="radio" /> <span>Mr.</span>
					<input id="civilite" name="civilite" type="radio" /> <span>Mme</span>
				</div>
								
								
				<!-- Prénom -->
				<div class="form-group">
					<label for="prenom">Prénom <span>*</span></label>
					<input id="prenom" name="prenom" type="text"></input>
				</div>

				<!-- Nom -->
				<div class="form-group">
					<label for="nom">Nom <span>*</span></label>
					<input id="nom" name="nom" type="text"></input>
				</div>

				<!-- Adresse email -->
				<div class="form-group">
					<label for="email">Adresse e-mail <span>*</span> </label>
					<input id="email" name="email" type="email"></input>
				</div>

				<!-- Date de naissance -->
				<div class="form-group">
					<label for="date">Date de naissance </label>
					<input id="date" name="date" type="date"></input>
				</div>

				<!-- Nouveau mot de passe-->
				<div class="form-group">
					<label for="password">Mot de passe<span>*</span> </label>
					<input id="password" name="password" type="password"></input>
				</div>	

				<!-- Confirmation du mot de passe-->
				<div class="form-group">
					<label for="password-confirm">Confirmer votre nouveau mot de passe <span>*</span> </label>
					<input id="password-confirm" name="password-confirm" type="password"></input>
				</div>								

				<!-- Newsletter -->
				<div class="form-group">
					<input id="check-newsletter" name="newsletter" type="checkbox" />
					<label for="check-newsletter"> J'aimerais m'abonner à la newsletter de Home de goît.com</label>
				</div>	
				

				<!-- Bouton valider -->
				<div class="form-group submit-button">
					<input class="hdg-button-small" id="submit" name="submit" type="submit" value="Créer un compte" />
				</div>	

			</form>
		</div>

		<hr class="divider"></hr>

		<div class="login-content">
			<p>Vous avez déjà un compte ? connectez-vous par <a href="#">ici</a> </p>
		</div>

	</div>
</div>
@endsection