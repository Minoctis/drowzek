@extends('layouts.admin')
@section('title', $page->titre)
@section('content')
    <div class="row" style="
    background-color: white;
    border: 1px solid #ddd;
">
        <div class="col-xs-12">
            <div class="admin-bloc">

                <div class="admin-bloc-title">
                    <h3>Contenu de la page <strong>{{ $page->titre }}</strong> :</h3>
                </div>

                <form action="" method="POST">
                    {{ csrf_field() }}
                    <!-- Nom -->
                    <div class="form-group">
                        <label class="control-label" for="titre">Titre <span>*</span></label>
                        <input class="form-control" id="titre" name="titre" type="text" value="{{$page->titre}}" required>
                    </div>

                    <!-- Nom -->
                    <div class="form-group">
                        <label class="control-label" for="chemin">Chemin <span>*</span></label>
                        <input class="form-control" id="chemin" name="chemin" type="text" value="{{$page->slug}}" required disabled>
                    </div>

                    <!-- Prénom -->
                    <div class="form-group">
                        <label class="control-label" for="desc">Description <span>*</span></label>
                        <textarea class="form-control" rows="20" id="desc" name="desc" type="text" value="{{$page->description}}" required>{{$page->description}}</textarea>
                    </div>

                    <!-- E-mail -->
                    <div class="form-group">
                        <label class="control-label" for="ordre">Ordre <span>*</span></label>
                        <input class="form-control" id="ordre" name="ordre" type="text" value="{{$page->ordre}}" required disabled>
                    </div>



                    <!-- Bouton valider -->
                    <div class="form-group submit-button" style="float: right;">
                        <input class="hdg-button-small" id="submit" name="submit" type="submit" value="Mettre à jour" />
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection