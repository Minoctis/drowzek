@extends('layouts.admin')
@section('title', 'Liste des catégories')
@section('content')
<div class="col-xs-12">
    <ol class="breadcrumb">
        <li><a href="{{ route('admin::dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('admin::catalogue::dashboard') }}">Catalogue</a></li>
        <li class="active">Catégories</li>
    </ol>
</div>
@endsection