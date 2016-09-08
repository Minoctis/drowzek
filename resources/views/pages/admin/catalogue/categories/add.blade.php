@extends('layouts.admin')
@section('title', 'Ajouter une catégorie')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin::dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('admin::catalogue::dashboard') }}">Catalogue</a></li>
                <li class="active">Ajouter une catégorie</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-4 col-lg-offset-4">
            <h2>Ajouter une catégorie</h2>
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
            <form action="" method="post" enctype="multipart/form-data">
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
                    <label for="img">Image</label>
                    <input type="file" name="img">
                    <p class="help-block">Formats acceptés: JPG, PNG, GIF. Poids max.: 500Ko.</p>
                </div>
                <a href="{{ route('admin::catalogue::dashboard') }}" class="btn btn-default">Annuler</a>
                <div class="pull-right">
                    <input type="submit" class="btn btn-default" value="Enregistrer">
                </div>
            </form>
        </div>
    </div>
@endsection