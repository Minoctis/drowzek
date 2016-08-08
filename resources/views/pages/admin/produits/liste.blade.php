@extends('layouts.admin')
@section('title', 'Liste des produits')
@section('content')
    <div class="container">
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
                    @foreach($produits as $produit)
                    <tr>
                        <td>{{$produit->nom}}</td>
                        <td>{{ $produit->is_new ? 'Oui' : 'Non' }}</td>
                        <td>@if($produit->categorie->parent->id)<a href="{{ route('admin::catalogue::categories::edit', $produit->categorie->parent->id) }}">{{ $produit->categorie->parent->nom }}@endif</a> // <a href="{{ route('admin::catalogue::categories::edit', $produit->categorie->id) }}">{{ $produit->categorie->nom }}</a></td>
                        <td>@foreach($produit->ambiances as $ambiance)<a href="{{ route('admin::catalogue::ambiances::edit', $ambiance->id) }}">{{ $ambiance->nom }}</a>@endforeach</td>
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
@endsection