@extends('layouts.admin')
@section('title', 'Liste des produits')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a href="{{ route('admin::produits::add') }}" class="btn btn-default pull-right">Ajouter un produit</a>
            </div>
        </div>
        <div class="row">
            <div class="liste-produit-BO">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="table-liste-produits">
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
                        <tr>
                            <td><input id="recherche-produit-nom" type="text" name="nom" class="form-control" placeholder="Nom"></td>
                            <td>
                                <select name="nouveau" id="recherche-produit-nouveau">
                                    <option value="">Tous</option>
                                    <option value="1">Oui</option>
                                    <option value="0">Non</option>
                                </select>
                            </td>
                            <td>
                                <select name="categorie" id="recherche-produit-categorie">
                                    <option value="">Toutes</option>
                                    @foreach($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                            </td>
                            <td></td>
                            <td></td>
                            <td><input class="hdg-button-small" type="button" onclick="rechercheProduits()" value="Rechercher"></td>
                        </tr>
                        @foreach($produits as $produit)
                            <tr @if ($produit->trashed()) class="disable" @endif>
                                <td>{{$produit->nom}}</td>
                                <td>{{ $produit->is_new ? 'Oui' : 'Non' }}</td>
                                <td>@if($produit->categorie->parent->id)<a href="{{ route('admin::catalogue::categories::edit', $produit->categorie->parent->id) }}">{{ $produit->categorie->parent->nom }}</a>@endif // <a href="{{ route('admin::catalogue::categories::edit', $produit->categorie->id) }}">{{ $produit->categorie->nom }}</a></td>
                                <td>@foreach($produit->ambiances as $ambiance)<a href="{{ route('admin::catalogue::ambiances::edit', $ambiance->id) }}">{{ $ambiance->nom }}</a>@endforeach</td>
                                <td>{{ $produit->options->count() }}</td>
                                <td><a href="{{ route('admin::produits::edit', $produit->id) }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Modifier</a></td>
                                <td><input class="bootstrap-switch-input" data-on-color="success" data-off-color="danger" type="checkbox" {{ $produit->trashed() ? '' : 'checked' }} onchange="deleteRestoreProduit(this, {{ $produit->id }})"></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script id="template-list-item" type="text/template">
        <tr>
            <td>##nom##</td>
            <td>##nouveau##</td>
            <td>##lienCatParent## // <a href="##lienCatEnfant##">##nomCatEnfant##</a></td>
            <td>##ambiances##</td>
            <td>##ambiancesTotal##</td>
            <td><a href="##lienEditProduit##" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Modifier</a></td>
            <td><button class="btn btn-danger" data-toggle="modal" data-target="#delete-produit" onclick="openModalDeleteProduit(##produit_id##, ##produit_nom##)"><span class="glyphicon glyphicon-trash"></span> Supprimer</button></td>
        </tr>
    </script>
    @include('modals.produits.delete')
    <script>
        $(function(argument) {
            $('.bootstrap-switch-input').bootstrapSwitch();
        })
    </script>
@endsection