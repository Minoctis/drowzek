@extends('layouts.admin')
@section('title', 'Liste des produits')
@section('content')
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <table class="table">
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
                        <td>Oui</td>
                        <td><a href=""></a></td>
                        <td><a href="">Ambiance 1</a></td>
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