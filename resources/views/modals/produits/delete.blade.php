@extends('modals.modal')
@section('modalId', 'delete-produit')
@section('labelId', 'delete-produit-label')
@section('modalTitle', 'Supprimer un produit')
@section('modalContent', 'Voulez-vous retirer le produit [produitNom] du catalogue ? Vous pourrez le réactiver par la suite si nécessaire.')
@section('modalFooter')
<div class="pull-right">
    <button class="btn bnt-default" data-dismiss="modal">Annuler</button>
    <button class="btn btn-danger">Supprimer</button>
</div>
@endsection