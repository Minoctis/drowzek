<form action="" method="post">
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" name="nom" class="form-control">
    </div>
    <div class="form-group">
        <label for="slug">Personnaliser l'URL</label>
        <input type="text" name="slug" class="form-control">
        <p class="help-block">Ne doit contenir que des lettres, des chiffres ou des tirets.</p>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" rows="5" class="form-control"></textarea>
    </div>
    <a href="{{ route('admin::catalogue::dashboard') }}" class="btn btn-default">Annuler</a>
    <div class="pull-right">
        <a href="" class="btn btn-default">Prévisualiser</a>
        <input type="submit" class="btn btn-default" value="Enregistrer">
    </div>
</form>