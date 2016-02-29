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
        @include('elements.admin.form.ambiance')
        <p class="help-block">Pour ajouter des images, veuillez d'abord créer l'ambiance.</p>
    </div>
@endsection