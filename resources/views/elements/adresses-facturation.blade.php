<ul>
	<li>
		<span class="societe-client">{{ $adresse->societe }}&nbsp;</span>
	</li>
	<li>
		<span class="prenom-client">{{ $adresse->prenom_livraison }}</span>
		<span class="nom-client"> {{ $adresse->nom_livraison }}</span>
	</li>
	<li>
		<span class="adresse">{{ $adresse->adresse }}</span>
	</li>
	<li>
		<span class="compl-adresse">{{ $adresse->compl_adresse }}</span>
	</li>
	<li>
		<span class="ville">{{ $adresse->ville }}</span>
		<span class="cp">{{ $adresse->cp }}</span>
	</li>
	<li>
		<span class="pays">{{ $adresse->pays->libelle }}</span>
	</li>
</ul>
@include('modals.compte.delete-adresse')