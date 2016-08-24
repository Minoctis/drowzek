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
            <div class="table-responsive">
                <table class="table table-hover">
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
                    <tr>
                        <td>{{$produit->nom}}</td>
                        <td>{{ $produit->is_new ? 'Oui' : 'Non' }}</td>
                        <td>@if($produit->categorie->parent->id)<a href="{{ route('admin::catalogue::categories::edit', $produit->categorie->parent->id) }}">{{ $produit->categorie->parent->nom }}@endif</a> // <a href="{{ route('admin::catalogue::categories::edit', $produit->categorie->id) }}">{{ $produit->categorie->nom }}</a></td>
                        <td>@foreach($produit->ambiances as $ambiance)<a href="{{ route('admin::catalogue::ambiances::edit', $ambiance->id) }}">{{ $ambiance->nom }}</a>@endforeach</td>
                        <td>{{ $produit->ambiances->count() }}</td>
                        <td><a href="{{ route('admin::produits::edit', $produit->id) }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Modifier</a></td>
                        <td><button class="btn btn-danger" data-toggle="modal" data-target="#delete-produit" onclick="openModalDeleteProduit({{ $produit->id }}, {{ '"'.$produit->nom.'"' }})"><span class="glyphicon glyphicon-trash"></span> Supprimer</button></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('modals.produits.delete')
@endsection