@extends('layouts.admin')
@section('title', 'Gestion des avis')
@section('content')
<div class="admin-avis">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>N.</th>
                    <th>Produit</th>
                    <th>Avis</th>
                    <th>Statut</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($avis as $preview)
                    <tr>
                        <td>{{ $preview->id }}</td>
                        <td>{{ $preview->produit->nom }}</td>
                        <td>{{ $preview->texte }}</td>
                        <td>
                            <div class="avis-statut">
                                <input class="bootstrap-switch-input" data-id="{{ $preview->id }}" data-on-color="success" data-off-color="danger" type="checkbox" {{ $preview->is_active ? 'checked' : '' }}>
                            </div>
                        </td>
                        <td><button class="btn btn-danger" data-toggle="modal" data-target="#delete-avis" onclick="openModalDeleteAvis({{ $preview->id }})"><span class="glyphicon glyphicon-trash"></span> Supprimer</button></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('modals.avis.delete')
<script>
    $(function(argument) {
        $('.bootstrap-switch-input').bootstrapSwitch();
    })
</script>
@endsection