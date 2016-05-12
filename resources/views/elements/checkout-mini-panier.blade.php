
<div class="title-checkout-panel">
	<h3>Mon panier</h3>
</div>
	<div class="bloc-recap-panier">
		@foreach($produits as $produit)
			
			@include('elements.checkout-product')

		@endforeach
	</div>



<div class="recap-infos">
	<div class="table-responsive">
		<table class="table">
			<tr>
				<td>Total HT :</td>
				<td><span id="total-ht">{{ round($total_ht, 2) }}</span> €</td>
			</tr>
			<tr>
				<td>Total TTC :</td>
				<td><span id="total-TTC">{{ round($total_ht, 2) + round($total_tva, 2) }}</span> €</td>
			</tr>
			<tr>
				<td>Dont TVA :</td>
				<td><span id="total-tva">{{ round($total_tva, 2) }}</span> €</td>
			</tr>
			@if(!Request::is('checkout/adresses'))
			<tr>
				<td>Frais de port :</td>
				<td>17 €</td>
			</tr>
			@endif
			<!-- Montant Total -->
			<tr class="last">
				<td>Montant Total :</td>
				<td>{{ Request::is('checkout/adresses') ? round($total_ht, 2) + round($total_tva, 2) : round($total_ht, 2) + round($total_tva, 2) + 17 }}</td>
			</tr> 
			<!-- Fin Montant Total -->

		</table>
	</div>
</div>
