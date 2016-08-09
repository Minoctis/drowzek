@extends('layouts.admin')
@section('title', 'Liste des produits')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="form-inline form-group">
                    <label for="">Rechercher un produit: </label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Nom, référence...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div><!-- /input-group -->
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <a href="{{ route('admin::produits::add') }}" class="btn btn-default pull-right">Ajouter un produit</a>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Ref.</th>
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
                    @foreach($produits as $produit)
                    <tr>
                        <td>{{$produit->reference}}</td>
                        <td>{{$produit->nom}}</td>
                        <td>{{ $produit->is_new ? 'Oui' : 'Non' }}</td>
                        <td>@if($produit->categorie->parent->id)<a href="{{ route('admin::catalogue::categories::edit', $produit->categorie->parent->id) }}">{{ $produit->categorie->parent->nom }}@endif</a> // <a href="{{ route('admin::catalogue::categories::edit', $produit->categorie->id) }}">{{ $produit->categorie->nom }}</a></td>
                        <td>@foreach($produit->ambiances as $ambiance)<a href="{{ route('admin::catalogue::ambiances::edit', $ambiance->id) }}">{{ $ambiance->nom }}</a>@endforeach</td>
                        <td>1</td>
                        <td><a href="{{ route('admin::produits::edit', $produit->id) }}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Modifier</a></td>
                        <td><button class="btn btn-default" data-toggle="modal" data-target="#delete-produit" onclick="openModalDeleteProduit({{ $produit->id }}, {{ '"'.$produit->nom.'"' }})"><span class="glyphicon glyphicon-trash"></span> Supprimer</button></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('modals.produits.delete')
@endsection