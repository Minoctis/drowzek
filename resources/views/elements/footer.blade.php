@section('footer')
<footer>
	<div class="container">
		<div class="row spacer"></div>
		<div class="row reseaux">
			<div class="col-lg-12">
				<span class="title-footer-big">Retrouvez nous aussi sur :</span>
			</div>
		</div>	
		<div class="row reseaux">
			<div class="col-lg-2 col-md-4 col-sm-4 col-xs-4 social-icons">
				<p>
					<a ref="#">
						<span style="color:#043861">
							<i class="fa fa-facebook"></i><br />
							Facebook
						</span>
					</a>
				</p>
			</div>
			<div class="col-lg-2 col-md-4 col-sm-4 col-xs-4 social-icons">
				<p>
					<a ref="#">
						<span style="color:#307be1">
							<i class="fa fa-twitter"></i><br />
							Twitter
						</span>
					</a>
				</p>
			</div>
			<div class="col-lg-2 col-md-4 col-sm-4 col-xs-4 social-icons">
				<p>
					<a ref="#">
						<span style="color:#ca0814">
							<i class="fa fa-google-plus"></i><br />
							Google +
						</span>
					</a>
				</p>
			</div>
			<div class="col-lg-2 col-md-4 col-sm-4 col-xs-4 social-icons">
				<p>
					<a ref="#">
						<span style="color:#77400b">
							<i class="fa fa-instagram"></i><br />
							Instagram
						</span>
					</a>
				</p>
			</div>
			<div class="col-lg-2 col-md-4 col-sm-4 col-xs-4 social-icons">
				<p>
					<a ref="#">
						<span style="color:#cd2c2f">
							<i class="fa fa-pinterest"></i><br />
							Pinterest
						</span>
					</a>
				</p>
			</div>
			<div class="col-lg-2 col-md-4 col-sm-4 col-xs-4 social-icons">
				<p>
					<a ref="#">
						<span style="color:#650205">
							<i class="fa fa-youtube"></i><br />
							Youtube
						<span>
					</a>
				</p>
			</div>
		</div>
	</div>
	<div class="row spacer bottom"></div>
	<div class="row spacer"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 a-propos">
				<h3 class="title-footer">Nos services</h3>
				<p>
					<a href="#">Livraison</a><br />
					<a href="#">Financement</a><br />
					<a href="#">Catalogue</a><br />
					<a href="#">Garanties</a><br />
					<a href="#">Conditions générales de vente</a><br />
				</p>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-4 col-xs-12 a-propos">
				<h3 class="title-footer">A propos de nous</h3>
				<p>
					Home de Goût a été créé par son designer principal, Philippe Drowzek.
					Son amour du design et des beaux objets l'on poussé a créer des meubles avant-gardistes.
					Il cherche aussi les accessoires qui complètent ses designs chez les antiquaires et les designers.
				</p>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 a-propos">
				<img src="{{ asset('img/logo_footer.svg') }}" style="width: 100%;" />
			</div>
		</div>
	</div>
	<div class="row spacer hidden-xs">
	</div>
	<div class="row mentions">
		<div class="container">
			<div class="col-lg-12">
				<p>
					<a href="#">Contact</a> | <a href="#">Politique de confidentialité</a> | <a href="#">Mentions légales</a> | <a href="#">Plan du site</a>
				</p>
			</div>
		</div>
	</div>
</footer>


@endsection