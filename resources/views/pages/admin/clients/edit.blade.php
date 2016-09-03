@extends('layouts.admin')
@section('title', $client->nom.' '.$client->prenom)
@section('content')

<div class="row">
        <div class="col-xs-12">
            <div class="admin-bloc">

            <div class="admin-bloc-title">
                <h3>Information du client :</h3>
            </div>
                <span class="pass-lost">
                    Ce client à oublié son mot de passe ? <a href="#">Lui envoyer par e-mail</a>
                </span>
            <span class="informations"><span class="glyphicon glyphicon-info-sign"></span> Vous pouvez modifier les informations du client à partir de ce formulaire.</span>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs produit-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#infos" aria-controls="home" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Informations</a></li>
                    <li role="presentation"><a href="#adresses" aria-controls="profile" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-euro" aria-hidden="true"></span> Adresses</a></li>
                    <li role="presentation"><a href="#commandes" aria-controls="profile" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Commandes</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="infos">

                        <form action="" method="POST">
                            {{ csrf_field() }}
                            <!-- Civilité -->
                            <div class="form-inline form-group">
                                <label class="control-label" for="civilite">Civilité <span>*</span></label> <br>
                                <label for="civilite-h">Monsieur</label>
                                <input name="civilite" id="civilite-h" value="2" type="radio" {{ $client->civilite_id === 2 ? 'checked' : '' }}>
                                <label for="civilite-f">Madame</label>
                                <input name="civilite" id="civilite-f" value="1" type="radio" {{ $client->civilite_id === 1 ? 'checked' : '' }}>
                            </div>

                            <!-- Nom -->
                            <div class="form-group">
                                <label class="control-label" for="nom">Nom <span>*</span></label>
                                <input class="form-control" id="nom" name="nom" type="text" value="{{$client->nom}}" required>
                            </div>

                            <!-- Prénom -->
                            <div class="form-group">
                                <label class="control-label" for="prenom">Prénom <span>*</span></label>
                                <input class="form-control" id="prenom" name="prenom" type="text" value="{{$client->prenom}}" required>
                            </div>

                            <!-- E-mail -->
                            <div class="form-group">
                                <label class="control-label" for="email">E-mail <span>*</span></label>
                                <input class="form-control" id="email" name="email" type="text" value="{{$client->email}}" required>
                            </div>

                            <!-- Date de naissance -->
                            <div class="form-group">
                                <label class="control-label" for="date-naissance">Date de naissance</label>
                                <input class="form-control" id="date-naissance" name="naissance" type="text" value="{{ empty($client->date_naissance) ? '' : date("d/m/Y", strtotime($client->date_naissance))}}">
                                <p class="help-block">format: jj/mm/aaaa</p>
                            </div>

                            <!-- Date d'inscription -->
                            <div class="form-group">
                                <label class="control-label" for="date-inscription">Date d'inscription</label>
                                <p>{{date("d/m/Y", strtotime($client->date_inscription))}}</p>
                            </div>

                            <!-- Bouton valider -->
                            <div class="form-group submit-button">
                                <input class="hdg-button-small" id="submit" name="submit" type="submit" value="Mettre à jour les informations" />
                            </div>
                        </form>
                    </div>


                    <div role="tabpanel" class="tab-pane" id="adresses">
                        <div class="row">
                        @foreach($client->adresses as $adresse)
                            <div class="adresse col-md-6 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        {{$adresse->nom_carnet_adresse}}
                                        <span class="remove-adresse"><a href="#"><span class="glyphicon glyphicon-minus"></span></a></span>
                                    </div>
                                    <div class="panel-body">
                                        <a href="#" class="update-adresse">Mettre à jour</a>
                                        <ul>
                                            <li>
                                                <span class="nom-client">{{ $client->prenom }}</span>
                                                <span class="prenom-client"> {{ $client->nom }}</span>
                                            </li>
                                            <li>
                                                <span class="adresse">{{ $adresse->adresse }}</span>
                                            </li>
                                            <li>
                                                <span class="compl-adresse">{{ $adresse->compl_adresse }}</span>
                                            </li>
                                            <li>
                                                <span class="societe">{{ $adresse->societe }}</span>
                                            </li>
                                            <li>
                                                <span class="ville">{{ $adresse->ville }}</span>
                                                <span class="cp">{{ $adresse->cp }}</span>
                                            </li>
                                            <li>
                                                <span class="pays">France</span>
                                            </li>
                                            <li>
                                                <span class="tel">{{$adresse->telephones}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="commandes">
                        <div class="row">
                            @if($commandes->count() !== 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Référence</th>
                                        <th>Livraison</th>
                                        <th>Date</th>
                                        <th>Etat</th>
                                        <th>Facture</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($commandes as $commande)

                                        <tr>
                                            <td>{{$commande->reference}}</td>
                                            <td>{{$commande->ville_livraison}}</td>
                                            <td>{{ date("d/m/Y", strtotime($commande->date)) }}</td>
                                            <td>{{$commande->statut->libelle}}</td>


                                            <td><a href="" class="btn btn-default"><span class="glyphicon glyphicon-file"></span> Facture</a></td>
                                            <td><a href="{{ route('admin::clients::details', $client->id) }}" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span> Afficher</a></td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            @else
                                <tr>
                                    <p>Ce client n'a effectué aucune commande</p>
                                </tr>
                            @endif
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>



@endsection