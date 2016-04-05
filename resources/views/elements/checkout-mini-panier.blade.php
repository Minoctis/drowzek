
<div class="title-checkout-panel">
	<h3>Mon panier</h3>
</div>
	<div class="bloc-recap-panier">
		@for ($i = 0; $i < 8; $i++)
			
			@include('elements.checkout-product')

		@endfor
	</div>



<div class="recap-infos">
	<div class="table-responsive">
		<table class="table">
			<tr>
				<td>Total HT :</td>
				<td>1899 €</td>
			</tr>
			<tr>
				<td>Total TTC :</td>
				<td>2000 €</td>
			</tr>
			<tr>
				<td>Dont TVA :</td>
				<td>200 €</td>
			</tr>

			<!-- Montant Total -->
			<tr class="last">
				<td>Montant Total :</td>
				<td>2000 €</td>
			</tr> 
			<!-- Fin Montant Total -->

		</table>
	</div>
</div>
