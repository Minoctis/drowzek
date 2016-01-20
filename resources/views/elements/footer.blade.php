@section('footer')
<footer>
	<div class="container">
		<div style="height:200px">
				<!-- cette div est en attente de hauteur du header (deux doigts coupe faim) -->
		</div>
		<div class="row reseaux">
			<div class="col-lg-12">
				<span class="titleFooterBig">Retrouvez nous aussi sur :</span>
			</div>
		</div>	
		<div class="row reseaux">
			<div class="col-lg-2">
				<img src="{{ asset('img/icons/fb.png') }}" />
				<p><span style="color:#043861">Facebook</span></p>
			</div>
			<div class="col-lg-2">
				<img src="{{ asset('img/icons/twitter.png') }}" />
				<p><span style="color:#307be1">Twitter</span></p>
			</div>
			<div class="col-lg-2">
				<img src="{{ asset('img/icons/gplus.png') }}" />
				<p><span style="color:#ca0814">Google +</span></p>
			</div>
			<div class="col-lg-2">
				<img src="{{ asset('img/icons/instagram.png') }}" />
				<p><span style="color:#77400b">Instagram</span></p>
			</div>
			<div class="col-lg-2">
				<img src="{{ asset('img/icons/pinterest.png') }}" />
				<p><span style="color:#cd2c2f">Pinterest</span></p>
			</div>
			<div class="col-lg-1">
				<img src="{{ asset('img/icons/youtube.png') }}" />
				<p><span style="color:#650205">Youtube</span></p>
			</div>
		</div>
		<div class="row spacer bottom"></div>
		<div class="row spacer"></div>
		<div class="row aPropos">
			<div class="col-lg-3">
				<span class="titleFooter">Nos services</span>
				<p>
					<a href="#">Livraison</a><br />
					<a href="#">Financement</a><br />
					<a href="#">Catalogue</a><br />
					<a href="#">Garanties</a><br />
					<a href="#">Conditions générales de vente</a><br />
				</p>
			</div>
			<div class="col-lg-6 aPropos">
				<span class="titleFooter">A propos de nous</span>
				<p>
					Home de Goût a été créé par son designer principal, Philippe Drowzek.
					Son amour du design et des beaux objets l'on poussé a créer des meubles avant-gardistes.
					Il cherche aussi les accessoires qui complètent ses designs chez les antiquaires et les designers.
				</p>
			</div>
			<div class="col-lg-3 aPropos">
				<span class="titleFooter">LOGO</span>
			</div>
		</div>
	</div>
	<div class="row spacer">
	</div>
	<div class="row mentions">
		<div class="container">
			<div class="col-lg-12">
				<a href="#">Contact</a> | <a href="#">Politique de confidentialité</a> | <a href="#">Mentions légales</a> | <a href="#">Plan du site</a>
			</div>
		</div>
	</div>
</footer>


@endsection