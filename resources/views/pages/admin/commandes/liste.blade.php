@extends('layouts.admin')
@section('title', 'Liste des commandes')
@section('content')
    <div class="row">
        <div class="liste-commandes-BO">
        <div class="table-responsive">
            <table class="table" id="table-liste-commandes">
                <thead>
                <tr>
                    <th>Référence</th>
                    <th>Livraison</th>
                    <th>Client</th>
                    <th>Date</th>
                    <th>Etat</th>
                    <th>Facture</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <tr class="search-commande">
                        <td><input id="recherche-commande-reference" name="reference" type="text"></td>
                        <td><input id="recherche-commande-ville" name="ville" type="text"></td>
                        <td><input id="recherche-commande-client" name="client" type="text"></td>
                        <td><input id="recherche-commande-date" name="date-commande" type="date"></td>
                        <td>
                            <select id="recherche-commande-statut" name="statut" id="statut">
                                <option value=""></option>
                                @foreach( $commande_statuts as $statut )
                                    <option value="{{ $statut->id }}">{{ $statut->libelle }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td></td>
                        <td><input class="hdg-button-small" type="button" value="Rechercher" onclick="rechercheCommande()"></td>
                    </tr>
                @foreach($commandes as $commande)
                    <tr>
                        <td>{{$commande->reference}}</td>
                        <td>{{$commande->ville_livraison}}</td>
                        <td>{{$commande->nom_livraison}}</td>
                        <td>{{date("d/m/Y", strtotime($commande->date)) }}</td>
                        <td>
                            <select class="select-commande-statut" onchange="updateCommandeStatut(this, {{ $commande->id }})">
                                @foreach( $commande_statuts as $statut )
                                    <option value="{{ $statut->id }}" {{ $statut->id === $commande->commande_statut_id ? 'selected' : '' }}>{{ $statut->libelle }}</option>
                                @endforeach
                            </select>
                        </td>


                        <td><a href="" class="btn btn-default"><span class="glyphicon glyphicon-file"></span></a></td>
                        <td><a href="{{ route('admin::commandes::details', $commande->reference) }}" class="btn btn-default"><span class="glyphicon glyphicon-zoom-in"></span> Afficher</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <script id="template-list-item" type="text/template">
        <tr>
            <td>##reference##</td>
            <td>##ville##</td>
            <td>##nom##</td>
            <td>##date##</td>
            <td>
                <select class="select-commande-statut" onchange="updateCommandeStatut(this, ##id##)">##options##</select>
            </td>
            <td><a href="" class="btn btn-default"><span class="glyphicon glyphicon-file"></span></a></td>
            <td><a href="##lien_edition##" class="btn btn-default"><span class="glyphicon glyphicon-zoom-in"></span> Afficher</a></td>
        </tr>
    </script>
    <script id="template-list-option" type="text/template">
        <option value="##statut_id##" ##selected##>##libelle##</option>
    </script>
@endsection