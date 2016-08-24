@extends('modals.modal')
@section('modalId', 'delete-adresse')
@section('labelId', 'delete-adresse-label')
@section('modalTitle', 'Supprimer une adresse')
@section('modalContent', 'Voulez-vous retirer cet adresse ?<br><span class="text-danger text-uppercase">Cette action est irréversible.</span>')
@section('modalFooter')
    <div class="pull-right">
        <button class="btn bnt-default" data-dismiss="modal">Annuler</button>
        <button class="btn btn-danger" id="validate-supprimer-adresse" data-id="0">Supprimer</button>
    </div>
@endsection