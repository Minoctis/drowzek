@extends('modals.modal')
@section('modalId', 'delete-avis')
@section('labelId', 'delete-avis-label')
@section('modalTitle', 'Supprimer un avis')
@section('modalContent', 'Voulez-vous retirer cet avis ?<br><span class="text-danger text-uppercase">Cette action est irréversible.</span>')
@section('modalFooter')
    <div class="pull-right">
        <button class="btn bnt-default" data-dismiss="modal">Annuler</button>
        <button class="btn btn-danger" id="validate-supprimer-avis" data-id="0">Supprimer</button>
    </div>
@endsection