@extends('layouts.default')

@section('title', 'Mon compte - Home de goût')

@section('page-id', 'moncompte')

@section('content')
    <div class="moncompte">
        <div class="entete-page">
            <img src="{{ asset('img/themes/header-compte.jpg') }}" class="img img-reponsive" alt="Mon Compte">
            <h1 class="page-title">Mon compte</h1>
        </div>
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <p>Bonjour, <span>{{ Auth::user()->prenom." ".Auth::user()->nom }}</span> </p>
                <a href="{{ route('deconnexion') }}" class="logout"><i class="fa fa-sign-out"></i> Se déconnecter</a>

                <ul class="nav nav-tabs mon-compte-nav">
                    <li><a href="{{ route('compte::accueil') }}#accueil"><i class="fa fa-home"></i> Accueil de mon compte</a></li>
                    <li><a href="{{ route('compte::accueil') }}#commandes">Mes commandes</a></li>
                    <li class="active"><a data-toggle="tab" href="#infos-commande">Information de commande</a></li>
                    <li><a href="{{ route('compte::accueil') }}#adresses">Mes adresses</a></li>
                    <li><a href="{{ route('compte::accueil') }}#favorites">Mes produits enregistrés</a></li>
                    <li><a href="{{ route('compte::accueil') }}#infos"><i class="fa fa-user"></i> Mes informations personnelles</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="tab-content">
                    <!-- INFORMATIONS DE COMMANDE -->

                    <div id="infos-commande" class="tab-pane fade in active">
                        <h3 class="title-content-compte">Commande N°{{ $detail_commande->reference }}</h3>

                        <div class="entete-commande-infos">
                            <p class="etat-commande">Etat : {{ $detail_commande->statut->libelle }}</p>
                            <p class="date-commande">Commande passée le {{ date('d/m/Y', strtotime($detail_commande->date)) }}</p>
                        </div>

                        <div class="commande-infos">
                            <div class="top-content row">
                                <h4 class="sub-title-content-commande col-md-9 col-xs-12">Information de la commande :</h4>
                                <p class="infos-link facture col-md-3 col-xs-12"><a target="_blank" href="{{ route('facture', $detail_commande->reference) }}">Imprimer la facture</a></p>
                            </div>


                            <!-- Liste des produits commandés -->
                            <div class="produit-commandes">
                                <div class="row">
                                    @foreach($commande_produits as $key => $produit)

                                            <div class="produit col-md-3 col-sm-6 col-xs-12">
                                                {{--<div class="img-content">--}}
                                                {{--<img src="http://placehold.it/200x200" class="img img-reponsive" alt="">--}}
                                                {{--</div>--}}
                                                <div class="produit-infos">
                                                    <h4 class="title-produit">{{ $produit->produit_libelle }}</h4>
                                                    <p class="options">Matières : {{ $produit->option_libelle }}</p>
                                                    <p class="qte">Quantité : {{ $produit->quantite }}</p>
                                                    <p class="price">Prix : {{ $produit->prix_unitaire_ht * $produit->quantite + ($produit->taux_tva->valeur / 100 * $produit->prix_unitaire_ht * $produit->quantite) }}€</p>
                                                </div>

                                                @foreach($produits as $commande_produit)
                                                    @if($commande_produit->nom == $produit->produit_libelle)
                                                        <div class="avis-produit">
                                                            <button class="btn btn-success" data-toggle="modal" data-target="#add-avis-product-{{ $commande_produit->id }}"><span class="glyphicon glyphicon-pencil"></span> Ajouter un avis </button>
                                                        </div>
                                                        {{ $commande_produit->nom }} : {{ $commande_produit->id }}
                                                                <!-- Modal -->
                                                        <div class="modal fade" id="add-avis-product-{{ $commande_produit->id }}" tabindex="-1" role="dialog" aria-labelledby="add-avis-label">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        <h4 class="modal-title" id="update-slide-label">Ajouter un avis pour le produit : {{ $commande_produit->nom }}</h4>
                                                                    </div>
                                                                    <form action="/compte/add-avis/{{ $commande_produit->id }}" method="POST">
                                                                        {{ csrf_field() }}
                                                                        <div class="modal-body">
                                                                            <div class="form-add-avis">

                                                                                <input type="text" value="{{ $commande_produit->id }}" name="produit_id">

                                                                                <!-- Titre de l'avis -->
                                                                                <div class="form-group">
                                                                                    <label class="control-label" for="titre">Titre : <span>*</span></label>
                                                                                    <input class="form-control" id="titre" name="titre" type="text" required>
                                                                                </div>

                                                                                <!-- Description de l'avis -->
                                                                                <div class="form-group">
                                                                                    <label class="control-label" for="desc">Description : <span>*</span></label>
                                                                                    <textarea class="form-control" id="desc" name="desc" type="text" required></textarea>
                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <div class="pull-right">
                                                                                <button class="btn bnt-default" data-dismiss="modal">Annuler</button>
                                                                                <!-- Bouton valider -->
                                                                                <div class="form-group submit-button" style="float: right;">
                                                                                    <input class="hdg-button-small" id="submit" name="submit" type="submit" value="Mettre à jour" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>


                                    @endforeacH

                                </div>
                                <!--ul class="pagination">
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                </ul-->
                            </div>
                            <!-- Fin de liste produits commandés -->

                        </div>

                        <!-- Récapitulatif de la commande -->

                        <div class="recap-commande">
                            <div class="row">
                                <h4 class="sub-title-content-commande col-md-4 col-xs-12">Récapitulatif</h4>
                                <div class="recap-infos col-md-8 col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>Frais de port :</td>
                                                <td>{{ $detail_commande->frais_de_port }} €</td>
                                            </tr>
                                            <tr>
                                                <td>Total HT :</td>
                                                <td>{{ $commande_total_HT }} €</td>
                                            </tr>
                                            <tr>
                                                <td>Total TTC :</td>
                                                <td>{{ $commande_total_TTC }} €</td>
                                            </tr>
                                            <tr>
                                                <td>Dont TVA :</td>
                                                <td>{{ $commande_total_TTC - $commande_total_HT }} €</td>
                                            </tr>

                                            <!-- Montant Total -->
                                            <tr class="last">
                                                <td>Montant Total :</td>
                                                <td>{{ $commande_total_TTC + $detail_commande->frais_de_port }} €</td>
                                            </tr>
                                            <!-- Fin Montant Total -->

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Fin du récap de commande -->

                        <!-- Informations de livraison -->

                        <div class="livraison-infos">
                            <div class="top-content row">
                                <h4 class="sub-title-content-commande col-md-9 col-xs-12">Information de livraison :</h4>
                                <p class="infos-link suivi col-md-3 col-xs-12"><a href="#">Suivi de la commande</a></p>
                            </div>

                            <p class="mode-livraison">Vous avez choisi la livraison à domicile</p>



                            <div class="adresses">

                                <div class="row">

                                    <!-- adresse de livraison -->
                                    <div class="adresse-livraison col-md-6 col-xs-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Votre adresse de livraison</div>
                                            <div class="panel-body">
                                                <ul>
                                                    <li>
                                                        <span class="nom-client">{{ $detail_commande->nom_livraison }}</span>
                                                        <span class="prenom-client"> {{ $detail_commande->prenom_livraison }}</span>
                                                    </li>
                                                    <li>
                                                        <span class="societe">{{ $detail_commande->societe_livraison }}</span>
                                                    </li>
                                                    <li><li>
                                                        <span class="adresse">{{ $detail_commande->adresse_livraison }}</span>
                                                    </li>
                                                    <li>
                                                        <span class="compl-adresse">{{ $detail_commande->compl_adresse_livraison }}</span>
                                                    </li>
                                                    <li>
                                                        <span class="ville">{{ $detail_commande->ville_livraison }}</span>
                                                        <span class="cp">{{ $detail_commande->cp_livraison }}</span>
                                                    </li>
                                                    <li>
                                                        <span class="pays">{{ $detail_commande->paysLivraison->libelle }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- fin adresse de livraison -->

                                    <!-- adresse de factutation -->

                                    <div class="adresse-livraison col-md-6 col-xs-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Votre adresse de facturation</div>
                                            <div class="panel-body">
                                                <ul>
                                                    <li>
                                                        <span class="adresse">{{ $detail_commande->adresse_facturation }}</span>
                                                    </li>
                                                    <li>
                                                        <span class="compl-adresse">{{ $detail_commande->compl_adresse_facturation }}</span>
                                                    </li>
                                                    <li>
                                                        <span class="ville">{{ $detail_commande->ville_facturation }}</span>
                                                        <span class="cp">{{ $detail_commande->cp_facturation }}</span>
                                                    </li>
                                                    <li>
                                                        <span class="pays">{{ $detail_commande->paysFacturation->libelle }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- fin adresse de facturation -->
                                </div>

                            </div>
                        </div>

                        <!-- Fin informations de livraison -->


                        <!-- Informations de paiement -->
                        <div class="paiement-infos">
                            <div class="top-content row">
                                <h4 class="sub-title-content-commande col-md-9 col-xs-12">Information de paiement :</h4>
                            </div>

                            <div class="paiement">
                                <p class="mode-paiement">Vous avez choisi le paiement par <span class="mode">{{ $detail_commande->paiementType->libelle }}</span>, montant payé de <span class="price">{{ $commande_total_TTC + $detail_commande->frais_de_port }} €</span></p>
                            </div>
                        </div>
                        <!-- Fin informations de paiement -->



                    </div>

                    <!-- FIN INFORMATION DE COMMANDE -->

                </div>
            </div>
        </div>
    </div>
@endsection



