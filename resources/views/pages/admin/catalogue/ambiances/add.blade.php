@extends('layouts.admin')
@section('title', 'Ajouter une ambiance')
@section('content')
    <div class="col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin::dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin::catalogue::dashboard') }}">Catalogue</a></li>
            <li class="active">Ajouter une ambiance</li>
        </ol>
    </div>
    <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-4 col-lg-offset-4">
        <h2>Ajouter une ambiance</h2>
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
        <form action="" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" value="{{ old('nom') }}">
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
                <p class="help-block">Ne doit contenir que des lettres, des chiffres ou des tirets.</p>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" rows="5" class="form-control">{{ old('description') }}</textarea>
            </div>
            <a href="{{ route('admin::catalogue::dashboard') }}" class="btn btn-default">Annuler</a>
            <div class="pull-right">
                <a href="" class="btn btn-default">Prévisualiser</a>
                <input type="submit" class="btn btn-default" value="Enregistrer">
            </div>
        </form>
        <p class="help-block">Pour ajouter des images, veuillez d'abord créer l'ambiance.</p>
    </div>
@endsection