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
                Panel content
                <a href="{{ route('admin::catalogue::categories::liste') }}" class="btn btn-default">Accéder aux catégories</a>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Ambiances</h3>
            </div>
            <div class="panel-body">
                <a href="{{ route('admin::catalogue::ambiances::add') }}" class="btn btn-default">Ajouter une ambiance</a>
            </div>
        </div>
        <div class="row">@include('pages.admin.catalogue.ambiances.accueil')</div>
    </div>
@endsection