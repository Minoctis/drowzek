<div class="table-responsive table-commandes">          
	<table class="table">
		<thead>
			<tr>
				<th>Numéro de commande</th>
				<th>Date de commande</th>
				<th>Etat</th>
				<th>Facture</th>
				<th>Afficher</th>
			</tr>
		</thead>
		<tbody>
		@foreach($commandes as $commande)
			<tr>
				<td><a href="#">{{ $commande->reference }}</a></td>
				<td>{{ date('d/m/Y', strtotime($commande->date)) }}</td>
				<td>{{ $commande->statut->libelle }}</td>
				<td><a href="#"><i class="fa fa-file-text"></i></a></td>
				<td><a href="{{ route('compte::detailCommande', $commande->reference) }}"><i class="fa fa-external-link"></i></a></td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>