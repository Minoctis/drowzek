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
        @include('elements.admin.form.ambiance')
    </div>
    <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-4 col-lg-offset-4">
        <h3>Images</h3>
        <p class="help-block">L'image la plus à gauche est l'image principale de l'ambiance. Vous pouvez organiser les images en glisser-déposer.</p>
    </div>
    <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-3">
                <img src="http://placehold.it/800x450" class="img-responsive" alt="Responsive image">
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3">
                <img src="http://placehold.it/350x350" class="img-responsive" alt="Responsive image">
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3">
                <img src="http://placehold.it/350x350" class="img-responsive" alt="Responsive image">
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3">
                <img src="http://placehold.it/350x350" class="img-responsive" alt="Responsive image">
            </div>
        </div>
    </div>
@endsection