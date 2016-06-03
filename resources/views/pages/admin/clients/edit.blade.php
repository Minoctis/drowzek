@extends('layouts.admin')
@section('title', $client->nom.' '.$client->prenom)
@section('content')

<div class="row">
        <div class="col-xs-12">
            <div class="admin-bloc">

            <div class="admin-bloc-title">
                <h3>Information du client :</h3>
            </div>
            <span class="informations"><span class="glyphicon glyphicon-info-sign"></span> Vous pouvez modifiez les informations du client à partir de ce formulaire.</span>
            <form action="">

                <!-- Civilité -->
                <div class="form-group">
                    <label class="control-label" for="civilite">Civilité <span>*</span></label>
                    <input class="form-control" id="civilite" name="civilite" type="text" value="{{$client->civilite->libelle}}" required>
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
                    <input class="form-control" id="date-naissance" name="date-naissance" type="text" value="{{$client->naissance}}" required>
                </div>

                <!-- Date d'inscription -->
                <div class="form-group">
                    <label class="control-label" for="date-inscription">Date d'inscription <span>*</span></label>
                    <input class="form-control" id="date-inscription" name="date-inscription" type="text" value="{{$client->date_inscription}}" required>
                </div>

                <!-- Bouton valider -->
                <div class="form-group submit-button">
                    <input class="hdg-button-small" id="submit" name="submit" type="submit" value="Mettre à jour les informations" />
                </div>

            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="admin-bloc">
        <div class="col-xs-12">
            <div class="admin-bloc-title">
                <h3>Adresse du client :</h3>
            </div>
        </div>
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

<div class="row">
    <div class="admin-bloc">
        <div class="col-xs-12">
            <div class="admin-bloc-title">
                <h3>Commandes du client :</h3>
            </div>
        </div>

    </div>
</div>


@endsection