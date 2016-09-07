@extends('modals.modal')
@section('modalId', 'add-avis-product-' . $commande_produit->id)
@section('labelId', 'add-avis-label')
@section('modalTitle', 'Ajouter un avis pour le produit ' . $produit->produit_libelle)
@section('modalContent')
    <div class="form-add-avis">
        <form action="">
            <!-- Titre de l'avis -->
            <div class="form-group">
                <label class="control-label" for="titre">Titre : <span>*</span></label>
                <input class="form-control" id="titre" name="titre" type="text" required>
            </div>

            <!-- Description de l'avis -->
            <div class="form-group">
                <label class="control-label" for="desc">Description : <span>*</span></label>
                <textarea class="form-control" id="desc" name="desc" type="text" required></textarea>
            </div>
        </form>
    </div>
@endsection
@section('modalFooter')
    <div class="pull-right">
        <button class="btn bnt-default" data-dismiss="modal">Annuler</button>
        <button class="btn btn-success" id="validate-ajouter-avis" data-id="0">Ajouter</button>
    </div>
@endsection