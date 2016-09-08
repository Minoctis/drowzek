@extends('layouts.admin')
@section('title', $client->nom.' '.$client->prenom)
@section('content')

<div class="row" style="
    background-color: white;
    border: 1px solid #ddd;
">
        <div class="col-xs-12">
            <div class="admin-bloc">

            <div class="admin-bloc-title">
                <h3>Information du client :</h3>
            </div>
                <!--span class="pass-lost">

                    Ce client à oublié son mot de passe ? <a href="#">Lui envoyer par e-mail</a>
                </span-->
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
                        @foreach($adresses as $adresse)
                            <div class="adresse col-md-6 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        {{$adresse->nom_carnet_adresse}}
                                        <span class="remove-adresse"><a href="#"><span class="glyphicon glyphicon-minus"></span></a></span>
                                    </div>
                                    <div class="panel-body">
                                        <a href="#" class="update-adresse" data-toggle="modal" data-target="#update-adresse-{{ $adresse->id }}">Mettre à jour</a>
                                        <ul>
                                            <li>
                                                <span class="societe">{{ $adresse->societe }}</span>
                                            </li>
                                            <li>
                                                <span class="nom-client">{{ $adresse->prenom_livraison }}</span>
                                                <span class="prenom-client"> {{ $adresse->nom_livraison }}</span>
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
                                                <span class="pays">France</span>
                                            </li>
                                            <li>
                                                <span class="tel">{{$adresse->telephone}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                                <div class="modal fade" id="update-adresse-{{ $adresse->id }}" tabindex="-1" role="dialog" aria-labelledby="update-adresse-label">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="update-slide-label">Modifier l'adresse</h4>
                                            </div>
                                            <form action="/admin/clients/adresse/{{ $adresse->id }}" method="POST">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="form-update-adresse">
                                                        <input type="text" value="{{ $adresse->id }}" name="id" style="display: none;">
                                                        <!-- Société -->
                                                        <div class="form-group">
                                                            <label class="control-label" for="societe">Société :</label><br>
                                                            <input type="text" value="{{ $adresse->societe }}" name="societe">
                                                        </div>

                                                        <!-- Prénom -->
                                                        <div class="form-group">
                                                            <label class="control-label" for="prenom">Prénom : <span>*</span></label><br>
                                                            <input type="text" value="{{ $adresse->prenom_livraison }}" name="prenom_livraison">
                                                        </div>

                                                        <!-- Nom -->
                                                        <div class="form-group">
                                                            <label class="control-label" for="prenom">Nom : <span>*</span></label><br>
                                                            <input type="text" value="{{ $adresse->nom_livraison }}" name="nom_livraison">
                                                        </div>

                                                        <!-- Adresse -->
                                                        <div class="form-group">
                                                            <label class="control-label" for="adresse">Adresse : <span>*</span></label><br>
                                                            <input type="text" value="{{ $adresse->adresse }}" name="adresse">
                                                        </div>

                                                        <!-- Compl adresse -->
                                                        <div class="form-group">
                                                            <label class="control-label" for="compl_adresse">Complément d'adresse :</label><br>
                                                            <input type="text" value="{{ $adresse->compl_adresse }}" name="compl_adresse">
                                                        </div>

                                                        <!-- Ville -->
                                                        <div class="form-group">
                                                            <label class="control-label" for="ville">Ville : <span>*</span></label><br>
                                                            <input type="text" value="{{ $adresse->ville }}" name="ville">
                                                        </div>

                                                        <!-- Pays -->
                                                        <div class="form-group">
                                                            <label class="control-label" for="pays">Pays : <span>*</span></label><br>
                                                            <select name="pays" id="">
                                                                @foreach($pays as $pays_adresse)
                                                                    <option value="{{ $pays_adresse->id }}">{{$pays_adresse->libelle}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <!-- Tél -->
                                                        <div class="form-group">
                                                            <label class="control-label" for="ville">Téléphone : <span>*</span></label><br>
                                                            <input type="text" value="{{ $adresse->telephone }}" name="tel">
                                                        </div>

                                                        <!-- Tél -->
                                                        <div class="form-group">
                                                            <label class="control-label" for="nom_adresse">Nom adresse : <span>*</span></label><br>
                                                            <input type="text" value="{{ $adresse->nom_carnet_adresse }}" name="nom_adresse">
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


                                            <td><a target="_blank" href="{{ route('facture', $commande->reference) }}" class="btn btn-default"><span class="glyphicon glyphicon-file"></span> Facture</a></td>
                                            <td><a href="{{ route('admin::commandes::details', $commande->reference) }}" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span> Afficher</a></td>
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