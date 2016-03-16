@extends('layouts.admin')
@section('title', 'Ajouter une ambiance')
@section('content')
    <div class="col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin::dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin::catalogue::dashboard') }}">Catalogue</a></li>
            <li class="active">Modifier une ambiance</li>
        </ol>
    </div>
    <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-4 col-lg-offset-4">
        <h2>Modifier une ambiance</h2>
        <h3>Informations</h3>
        <form action="" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" value="{{ $ambiance->nom }}">
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" class="form-control" value="{{ $ambiance->slug }}">
                <p class="help-block">Ne doit contenir que des lettres, des chiffres ou des tirets.</p>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" rows="5" class="form-control">{{ $ambiance->description }}</textarea>
            </div>
            <a href="{{ route('admin::catalogue::dashboard') }}" class="btn btn-default">Annuler</a>
            <div class="pull-right">
                <a href="" class="btn btn-default">Prévisualiser</a>
                <input type="submit" class="btn btn-default" value="Enregistrer">
            </div>
        </form>
    </div>
    <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-4 col-lg-offset-4">
        <h3>Images</h3>
        <p class="help-block">L'image la plus à gauche est l'image principale de l'ambiance. Vous pouvez organiser les images en glisser-déposer.</p>
    </div>
    <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
        <div class="row">
            @for($i = 0; $i < 4; $i++)
            <div class="col-xs-12 col-sm-4 col-md-3">
                <img src="http://placehold.it/800x450" class="img-responsive" alt="Responsive image">
            </div>
            @endfor
            {{ //todo : mettre l'ajout de fichier + modification des images existantes (ordre, supprimer...)  }}
        </div>
    </div>
    <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-4 col-lg-offset-4">
        <h3>Produits de l'ambiance</h3>
        <form action="" method="" class="form-inline">
            <div class="form-group">
                <label for="recherche-produit">Ajouter un produit</label>
                <input type="text" class="form-control" name="recherche-produit" placeholder="Saisissez le nom, l'id..">
                <input type="submit" class="btn btn-default" value="Ajouter">
            </div>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th class="text-right">Visualiser</th>
                    <th class="text-right">Modifier</th>
                    <th class="text-right">Retirer de l'ambiance</th>
                </tr>
            </thead>
            <tbody>
            @for($i = 0; $i < 5; $i++)
                <tr>
                    <td><span class="glyphicon glyphicon-picture"></span></td>
                    <td>{nom}</td>
                    <td><button class="btn btn-default pull-right"><span class="glyphicon glyphicon-eye-open" aria-hidden="true" aria-label="Visualiser"></span></button></td>
                    <td><button class="btn btn-default pull-right"><span class="glyphicon glyphicon-pencil" aria-hidden="true" aria-label="Modifier"></span></button></td>
                    <td><button class="btn btn-default pull-right"><span class="glyphicon glyphicon-trash" aria-hidden="true" aria-label="Retirer de l'ambiance"></span></button></td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>
@endsection