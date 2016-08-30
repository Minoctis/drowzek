@extends('modals.modal')
@section('modalId', 'update-slide')
@section('labelId', 'update-slide-label')
@section('modalTitle', 'Modifier un slide')
@section('modalContent')
    <div class="form-update-slide">
        <form action="">
            <!-- Image -->
            <div class="form-group">
                <label class="control-label" for="titre">Ajouter une nouvelle image : <span>*</span></label>
                <input type="file" value="{{ $slide->image_url }}" name="file">
            </div>

            <!-- Titre -->
            <div class="form-group">
                <label class="control-label" for="titre">Titre : <span>*</span></label><br>
                <input type="text" value="{{ $slide->titre }}" name="titre">
            </div>

            <!-- Lien -->
            <div class="form-group">
                <label class="control-label" for="lien">Lien : <span>*</span></label><br>
                <input type="text" value="{{ $slide->lein }}" name="lien">
            </div>

        </form>
    </div>
@endsection
@section('modalFooter')
    <div class="pull-right">
        <button class="btn bnt-default" data-dismiss="modal">Annuler</button>
        <button class="btn btn-success" id="validate-update-slide" data-id="0">Modifier</button>
    </div>
@endsection