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
                <span>{{ $commande_total_TTC }} €</span>
            </p>
        </div>

        <div class="col-md-4 col-xs-12">
            <p>
                <span class="glyphicon glyphicon-book"></span>
                Produit :
                <span>{{ $commande_produits->count() }}</span>
            </p>
        </div>

    </div>

    <div class="row">
        <div class="col-md-7 col-xs-12 commande-details">
            <div class="wrapper-commande-details">
                <div class="bloc-header">
                    <h4 class="commande-ref">Commande N° : {{ $commande->reference }} </h4>
                </div>
                <div class="bloc-content">
                    <a class="facture" target="_blank" href="{{ route('facture', $commande->reference) }}""><span class="glyphicon glyphicon-file"></span> Voir la facture</a>

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

                </div>

                <div class="row">
                    <div class="adresse col-md-12 col-xs-12">
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

                    <div class="adresse col-md-12 col-xs-12">
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

        </div>

        <div class="col-md-5 col-xs-12 commande-details-client">
            <div class="wrapper-commande-details-client">
                <div class="bloc-header">
                    <h4 class="client-name">Client : {{ $commande->client->nom.' '.$commande->client->prenom }}</h4>
                </div>
                <div class="bloc-content">
                    <a href="{{ route('admin::clients::details', $commande->client->id) }}" class="update-button btn btn-default">Mettre à jour</a>
                    <ul class="list-unstyled">
                        <li><span class="glyphicon glyphicon-envelope"></span> {{$commande->client->email}}</li>
                        <li><span class="glyphicon glyphicon-phone"></span>{{$commande->telephone_livraison}}</li>
                        <li>Date d'anniversaire : {{date("d/m/Y", strtotime($commande->client->date_naissance))}}</li>
                        <li>Date d'inscription : {{date("d/m/Y", strtotime($commande->client->date_inscription))}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-xs-12 commande-details-livraison">
            <div class="wrapper-commande-details-livraison">
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
    </div>

    <div class="row">
        <div class="col-xs-12 commandes-client">
            <div class="wrapper-commandes-client">
                <div class="bloc-header">
                    <h4 class="client-name">Les produits commandés ({{ $commande_produits->count() }})</h4>test
                </div>
                <div class="bloc-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prix</th>
                                <th>quantité</th>
                                <th>Option(s)</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($commande_produits as $produit)
                                <tr>
                                    <td>{{ $produit->produit_libelle }} </td>
                                    <td>{{ $produit->prix_unitaire_ht }}</td>
                                    <td>{{ $produit->quantite }}</td>
                                    <td>{{ $produit->option_libelle }}</td>
                                    <td><a href="" class="btn btn-default" data-toggle="modal" data-target="#update-product-{{ $produit->id }}"><span class="glyphicon glyphicon-pencil"></span> Modifier</a></td>
                                    <td><a href="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Supprimer</a></td>
                                </tr>


                                <div class="modal fade" id="update-product-{{ $produit->id }}" tabindex="-1" role="dialog" aria-labelledby="update-produit-label-{{ $produit->id }}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="update-slide-label">Modifier l'opportunité</h4>
                                            </div>
                                            <form action="/admin/commandes/{{ $commande->reference }}/{{ $produit->produit_libelle }}" method="POST">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="form-update-produit">

                                                        <p>Produit : <b>{{ $produit->produit_libelle }}</b> </p>

                                                        <!-- Quantité -->
                                                        <div class="form-group">
                                                            <label class="control-label" for="qt">Quantité : <span>*</span></label><br>
                                                            <input type="text" value="{{ $produit->quantite }}" name="qt">
                                                        </div>

                                                        <!-- Options -->
                                                        <div class="form-group">
                                                            <label class="control-label" for="option">Option : <span>*</span></label><br>
                                                            <select name="options" id="">
                                                               @foreach($produits as $commande_produit)
                                                                   @foreach( $commande_produit->options as $option)
                                                                        <option value="{{ $option->libelle }}">{{ $option->libelle }}</option>
                                                                    @endforeach
                                                               @endforeach
                                                            </select>
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
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection