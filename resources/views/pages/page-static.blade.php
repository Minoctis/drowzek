@extends('layouts.default')

@section('title', $page->titre)

@section('page-id',  $page->slug )

@section('breadcrumbs')
    <li class="active">{{ $page->titre }}</li>
@endsection

@section('content')
    <div class="page-static">
        <div class="entete-page">
            <img src="{{ asset('img/themes/header-compte.jpg') }}" class="img img-reponsive" alt="Mon Compte">
            <h1 class="page-title">{{ $page->titre }}</h1>
        </div>


        <div class="container">
            {!! $page->description !!}
        </div>
    </div>
@endsection