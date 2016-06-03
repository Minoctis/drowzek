@extends('layouts.default')

@section('title', 'titre d\'une page static')

@section('page-id', 'page-static')

@section('breadcrumbs')
    <li class="active">Page static</li>
@endsection

@section('content')

    <div class="entete-page">
        <img src="{{ asset('img/themes/header-compte.jpg') }}" class="img img-reponsive" alt="Mon Compte">
        <h1 class="page-title">Titre de la page static</h1>
    </div>


    <div class="container">
        <p>Contenu de la page static</p>
    </div>
@endsection