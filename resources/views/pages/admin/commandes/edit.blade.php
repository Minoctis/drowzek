@extends('layouts.admin')
@section('title', 'Commande N°'. $commande->reference)
@section('content')

<div id="details-commande">
    <div class="row commande-details-header">
        <div class="col-md-4 col-xs-12">
            <p>
                <span class="glyphicon glyphicon-calendar"></span>
                Date :
                <span>{{ date("d/m/Y", strtotime($commande->date)) }}</span>
            </p>
        </div>

        <div class="col-md-4 col-xs-12">
            <p>
                <span class="glyphicon glyphicon-euro"></span>
                Total :
                <span>9 998 €</span>
            </p>
        </div>

        <div class="col-md-4 col-xs-12">
            <p>
                <span class="glyphicon glyphicon-book"></span>
                Produit :
                <span>2</span>
            </p>
        </div>

    </div>

    <div class="row">
        <div class="col-md-7 col-xs-12 commande-details">
            <div class="bloc-header">
                <h4 class="commande-ref">Commande N° : {{ $commande->reference }} </h4>
            </div>
            <div class="bloc-content">
                <a class="facture" href="#"><span class="glyphicon glyphicon-file"></span> Voir la facture</a>

                <p>Commande passé le : <span class="glyphicon glyphicon-calendar"></span> {{  date("d/m/Y", strtotime($commande->date)) }}</p>

                <table class="etat-table table-responsive">
                    <tr class="validate">
                        <td>L'état de la commande</td>
                        <td><b>{{$commande->statut->libelle}}</b></td>
                        <td class="send-email"><a href="" class="btn btn-default">Renvoyer l'e-mail <span class="glyphicon glyphicon-share-alt"></span></a></td>
                    </tr>
                </table>

                <form action="#" id="update-statut">
                    <select name="statut" id="statut">
                        <option value="">En attente de paiement</option>
                        <option value="">Payée</option>
                        <option value="">En cours de préparation</option>
                        <option value="">Livraison</option>
                        <option value="">Livrée</option>
                        <option value="">Annulée</option>
                    </select>
                    <input class="hdg-button-small" type="submit" value="Mettre à jour l'état">
                </form>


                <div class="adresse col-md-6 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Adresse de livraison
                        </div>
                        <div class="panel-body">
                            <a href="" class="update-button">Modifier</a>
                            <ul>
                                <li>
                                    <span class="adresse">{{ $commande->adresse_livraison }}</span>
                                </li>
                                <li>
                                    <span class="compl-adresse">{{ $commande->compl_adresse_livraison }}</span>
                                </li>
                                <li>
                                    <span class="societe">{{ $commande->societe_livraison }}</span>
                                </li>
                                <li>
                                    <span class="ville">{{ $commande->ville_livraison }}</span>
                                    <span class="cp">{{ $commande->cp_livraison }}</span>
                                </li>
                                <li>
                                    <span class="pays">{{$commande->paysLivraison->libelle}}</span>
                                </li>
                                <li>
                                    <span class="tel">{{$commande->telephone_livraison}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="adresse col-md-6 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Adresse de facturation
                        </div>
                        <div class="panel-body">
                            <a href="" class="update-button">Modifier</a>
                            <ul>
                                <li>
                                    <span class="adresse">{{ $commande->adresse_facturation }}</span>
                                </li>
                                <li>
                                    <span class="compl-adresse">{{ $commande->compl_adresse_facturation }}</span>
                                </li>
                                <li>
                                    <span class="societe">{{ $commande->societe_facturation }}</span>
                                </li>
                                <li>
                                    <span class="ville">{{ $commande->ville_facturation }}</span>
                                    <span class="cp">{{ $commande->cp_facturation }}</span>
                                </li>
                                <li>
                                    <span class="pays">{{$commande->paysFacturation->libelle}}</span>
                                </li>
                                <li>
                                    <span class="tel">{{$commande->telephone_facturation}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-5 col-xs-12 commande-details-client">
            <div class="bloc-header">
                <h4 class="client-name">Client : {{ $commande->client->nom.' '.$commande->client->prenom }}</h4>
            </div>
            <div class="bloc-content">
                <a href="" class="update-button btn btn-default">Mettre à jour</a>
                <ul class="list-unstyled">
                    <li><span class="glyphicon glyphicon-envelope"></span> {{$commande->client->email}}</li>
                    <li><span class="glyphicon glyphicon-phone"></span>{{$commande->telephone_livraison}}</li>
                    <li>Date d'anniversaire : {{date("d/m/Y", strtotime($commande->client->date_naissance))}}</li>
                    <li>Date d'anniversaire : {{date("d/m/Y", strtotime($commande->client->date_inscription))}}</li>
                </ul>
            </div>
        </div>
        <div class="col-md-5 col-xs-12 commande-details-client">
            <div class="bloc-header">
                <h4 class="client-name">Mode de livraison</h4>
            </div>
            <div class="bloc-content">
                <p>Vous avez choisi la livraison <b>à domicile</b></p>
                <table class="etat-table table-responsive">
                    <tr class="validate">
                        <td>Livraison EXPRESS</td>
                        <td><b>{{$commande->frais_de_port}} €</b></td>
                        <td class="send-email"><a href="" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Modifier</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="bloc-header">
            <h4 class="client-name">Les produits commandés (2)</h4>
        </div>
        <div class="bloc-content">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Nouveauté</th>
                        <th>Catégorie</th>
                        <th>Ambiance(s)</th>
                        <th>Option(s)</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($commande_produits as $produit)
                        <tr>
                            <td>{{ $produit->nom }} </td>
                            <td>Oui</td>
                            <td><a href=""></a></td>
                            <td><a href="">Ambiance 1</a></td>
                            <td>1</td>
                            <td><a href="" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Modifier</a></td>
                            <td><a href="" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span> Supprimer</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection