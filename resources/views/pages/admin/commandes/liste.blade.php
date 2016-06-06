@extends('layouts.admin')
@section('title', 'Liste des commandes')
@section('content')
    <div class="row">
        <div class="table-responsive">
            <table class="table">
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
                <form action="#">
                    <tr class="search-commande">
                        <td><input name="reference" type="text"></td>
                        <td><input name="ville" type="text"></td>
                        <td><input name="client" type="text"></td>
                        <td><input name="date-commande" type="date"></td>
                        <td>
                            <select name="statut" id="statut">
                                <option value="">En attente de paiement</option>
                                <option value="">Payée</option>
                                <option value="">En cours de préparation</option>
                                <option value="">Livraison</option>
                                <option value="">Livrée</option>
                                <option value="">Annulée</option>
                            </select>
                        </td>
                        <td></td>
                        <td><input class="hdg-button-small" type="submit" value="Rechercher"></td>
                    </tr>
                </form>
                @foreach($commandes as $commande)
                    <tr>
                        <td>{{$commande->reference}}</td>
                        <td>{{$commande->ville_livraison}}</td>
                        <td>{{$commande->nom_livraison}}</td>
                        <td>{{date("d/m/Y", strtotime($commande->date)) }}</td>
                        <td>{{$commande->statut->libelle}}</td>


                        <td><a href="" class="btn btn-default"><span class="glyphicon glyphicon-file"></span></a></td>
                        <td><a href="{{ route('admin::commandes::details', $commande->reference) }}" class="btn btn-default"><span class="glyphicon glyphicon-zoom-in"></span> Afficher</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection