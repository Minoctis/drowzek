<div class="adresse col-md-6 col-xs-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			{{ $adresse->nom_carnet_adresse }}
			<span class="remove-adresse"><a href="#"><i class="fa fa-minus-square-o"></i></a></span>
		</div>
		<div class="panel-body">
			<a href="#" class="update-adresse" id="compte-edit-adresse-show">Mettre à jour</a>
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
		</div>
	</div>
</div>

@include('modals.compte.delete-adresse')