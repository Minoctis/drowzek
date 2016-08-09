@extends('modals.modal')
@section('modalId', 'delete-produit')
@section('labelId', 'delete-produit-label')
@section('modalTitle', 'Supprimer un produit')
@section('modalContent', 'Voulez-vous retirer le produit <strong>[produitNom]</strong> du catalogue ?<br><span class="text-danger text-uppercase">Cette action est irréversible.</span>')
@section('modalFooter')
<div class="pull-right">
    <button class="btn bnt-default" data-dismiss="modal">Annuler</button>
    <button class="btn btn-danger" id="validate-supprimer-produit" data-id="0">Supprimer</button>
</div>
@endsection