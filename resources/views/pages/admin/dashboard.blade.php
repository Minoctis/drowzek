@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div id="dashboard-page">
        <div class="dashboard-header">
            <div class="row">
                <div class="col-xs-12">
                    <p>Aujourd'hui, vous avez : </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3">
                <a class="item-dashboard-page">
                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true" style="font-size: 60px;"></span><br>
                    <span>{{ $commandes_jour->count() }} Nouvelles commandes</span>
                </a>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3">
                <a class="item-dashboard-page">
                    <span class="glyphicon glyphicon-lamp" aria-hidden="true" style="font-size: 60px;"></span><br>
                    <span>{{ $produits_jour->count() }} Produit en ligne</span>
                </a>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3">
                <a class="item-dashboard-page">
                    <span class="glyphicon glyphicon-comment" aria-hidden="true" style="font-size: 60px;"></span><br>
                    <span>{{ $avis_jour->count() }} Nouveau avis</span>
                </a>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3">
                <a class="item-dashboard-page">
                    <span class="glyphicon glyphicon-time" aria-hidden="true" style="font-size: 60px;"></span><br>
                    <span>On est le {{ $date_jour }}</span>
                </a>
            </div>

        </div>
    </div>

@endsection