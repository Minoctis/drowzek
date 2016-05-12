<div class="adresse col-md-6 col-xs-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			Nom de l'adresse
			<span class="remove-adresse"><a href="#"><i class="fa fa-minus-square-o"></i></a></span>
		</div>
		<div class="panel-body">
			<a href="#" class="update-adresse">Mettre à jour</a>
			<ul>
				<li>
					<span class="nom-client">{{ Auth::user()->prenom }}</span>
					<span class="prenom-client"> {{ Auth::user()->nom }}</span>
				</li>
				<li>
					<span class="adresse">100 rue nationale</span>
				</li>
				<li>
					<span class="compl-adresse">Appartement 3</span>
				</li>
				<li>
					<span class="ville">Lille</span>
					<span class="cp">59000</span>
				</li>
				<li>
					<span class="pays">France</span>
				</li>
			</ul>
		</div>
	</div>
</div>