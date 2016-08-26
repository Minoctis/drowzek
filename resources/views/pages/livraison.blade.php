@extends('layouts.default')

@section('title', 'Livraison')

@section('page-id', 'livraison')

@section('breadcrumbs')
    <li class="active">Livraison</li>
@endsection

@section('content')
	<div class="page-static">
		<div class="entete-page">
			<img src="{{ asset('img/themes/header-compte.jpg') }}" class="img img-reponsive" alt="Mon Compte">
			<h1 class="page-title">Livraison</h1>
		</div>


		<div class="container">
			<h3>
				LIVRAISONS
			</h3>
			<p>
				Nos produits sont fabriqués sur mesure avec le plus grand soin selon vos spécifications. Nous apportons le plus grand soin
				à la qualité de notre production et tous nos produits sur mesure sont contrôlés avant leur expédition. La livraison dépend
				des produits commandés et de la date de commande, elle peut prendre de 8 à 12 jours ouvrés.<br />
				<br />
				Les livraisons sont faites à l'adresse indiquée sur le bon de commande<br />
				Toute réclamation se fera par voie postale à l'adresse suivante Home de Goût - 1 rue Papin - ZI Les Prés, entrée C,
				porte D - 59650 Villeneuve d'ascq, dans un délai de trois jours à compter de la date de réception.<br />
				Malgré tous les soins portés à l'emballage du produit, il peut arriver que celui-ci soit abîmé au cours du transport.
				Prenez soin de vérifier l'état et le nombre de colis que le transporteur ou le préposé de la poste vous présente.<br />
				La Livraison sera effectuée quand le règlement sera réputé intangible. Home de Goût se réserve le droit de refuser
				d'effectuer une livraison ou d'honorer une commande lorsque la commande n'aura pas été réglée totalement ou lorsqu'il
				existe un litige portant sur le paiement d'une commande précédente qui serait en cours d'administration.<br />
				Le délai de livraison maximum effectif est de 45 jours ouvrés à compter de la confirmation de la commande.<br />
				Toutefois, si le délai de livraison excède trente jours à compter de la confirmation de commande, le contrat de vente
				pourra être résilié et l'Acheteur remboursé.<br />
				<br />
				- Livraison par la poste<br />
				L'Acheteur est tenu de vérifier, en présence du préposé de la poste, l'état de l'emballage de la marchandise et son contenu à la livraison.<br />
				Dans l'hypothèse ou l'acheteur aurait un doute que ce soit sur l'état ou le contenu de son colis il est tenu d'appliquer
				la procédure Colissimo Suivi (signaler les dommages et faire par écrit toutes réclamations et réserves) et de refuser
				la marchandise en émettant immédiatement un constat d'anomalie auprès du préposé de la poste.<br />
				<br />
				- Livraison par transporteur<br />
				En cas de doute sur l'état ou le contenu du colis, ou si le colis ou la marchandise est endommagé, refusez le.<br />
				En cas de produit ou colis manquant, mentionnez-le sur le bordereau de livraison ("X colis manquant (s)").<br />
				Ne jamais noter "sous réserve de déballage", cette mention n'a aucune valeur, elle sous entend au contraire que les colis
				ont été réceptionnés en bon état. La protestation doit se faire le jour de la livraison de la marchandise en présence
				du livreur (qui peut vous aider à déballer la commande) et qui constatera avec vous de son état.
			</p>
		</div>
	</div>
@endsection