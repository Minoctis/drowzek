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