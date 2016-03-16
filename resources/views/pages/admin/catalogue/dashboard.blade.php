@extends('layouts.admin')
@section('title', 'Gestion du catalogue')
@section('content')
    <div class="col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('admin::dashboard') }}">Dashboard</a></li>
            <li class="active">Catalogue</li>
        </ol>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Catégories</h3>
            </div>
            <div class="panel-body">
                <a href="{{ route('admin::catalogue::categories::add') }}" class="btn btn-default pull-right">Ajouter une catégories</a>
                <p class="help-block">Pour modifier l'ordre des catégories et des sous-catégories, faites un glisser-déposer de la ligne à la position voulue.</p>
                <div class="row">@include('pages.admin.catalogue.categories.liste')</div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Ambiances</h3>
            </div>
            <div class="panel-body">
                <a href="{{ route('admin::catalogue::ambiances::add') }}" class="btn btn-default pull-right">Ajouter une ambiance</a>
                <p class="help-block">Pour modifier l'ordre des ambiances, faites un glisser-déposer de la ligne à la position voulue.</p>
                <div class="row">@include('pages.admin.catalogue.ambiances.liste')</div>
            </div>
        </div>
    </div>
@endsection