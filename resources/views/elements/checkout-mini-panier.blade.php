<div class="container-fluid">
	<h4>Mon panier</h4>
	<div class="row overflow-panier">
		@for ($i = 0; $i < 8; $i++)
			
			@include('elements.checkout-product')

		@endfor
	</div>
	<div class="row black-border">
		<div class="row">
			<div class="col-lg-6 right-content">
				Total TTC:
			</div>
			<div class="col-lg-6 right-content">
				1899 €
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 right-content">
				Total hors taxes:
			</div>
			<div class="col-lg-6 right-content">
				1500 €
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 right-content">
				Total TVA 20%:
			</div>
			<div class="col-lg-6 right-content">
				499 €
			</div>
		</div>
	</div>
	<div class="row black-border">
		<div class="row">
			<div class="col-lg-6 right-content">
				Montant Total TTC:
			</div>
			<div class="col-lg-6 right-content">
				1899 €
			</div>
		</div>
	</div>
</div>