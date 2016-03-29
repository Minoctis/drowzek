@extends('layouts.admin')
@section('title', 'Modifier une catégorie')
@section('content')
    <div class="col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin::dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin::catalogue::dashboard') }}">Catalogue</a></li>
            <li class="active">Modifier une catégorie</li>
        </ol>
    </div>
    <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-4 col-lg-offset-4">
        <h2>Modifier une catégorie</h2>
        <h3>Informations</h3>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form enctype="multipart/form-data">
            {{ method_field('PUT') }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" value="{{ $categorie->nom }}">
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" class="form-control" value="{{ $categorie->slug }}">
                <p class="help-block">Ne doit contenir que des lettres, des chiffres ou des tirets.</p>
            </div>
            <div class="form-group">
                <img src="{{ isset($categorie->img_name) ? asset('img/categories/'.$categorie->img_name) : 'http://placehold.it/1600x900' }}" alt="{{ $categorie->slug }}" class="col-xs-12">
                <label for="img">Remplacer l'image</label>
                <input type="file" name="img">
                <p class="help-block">Formats acceptés: JPG, PNG, GIF. Poids max.: 500Ko.</p>
            </div>
            <a href="{{ route('admin::catalogue::dashboard') }}" class="btn btn-default">Annuler</a>
            <div class="pull-right">
                <input type="submit" class="btn btn-default" value="Enregistrer">
            </div>
        </form>
    </div>
@endsection