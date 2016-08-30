@extends('layouts.admin')
@section('title', 'Gestion du thème')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="admin-bloc">
                <div class="is-new">
                </div>
                <div class="theme-header">

                </div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs theme-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#infos" aria-controls="home" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Informations</a></li>
                    <li role="presentation"><a href="#slider" aria-controls="profile" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Slider</a></li>
                    <li role="presentation"><a href="#opportunite" aria-controls="profile" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Opportunité</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="infos">
                        <p style="text-align: center; font-size: 20px; margin-bottom: 50px; margin-top: 50px">Cette rubrique vous permet d'administrer les images existante dans le site.
                            <br>
                            <span class="glyphicon glyphicon-info-sign" aria-hidden="true" style="font-size: 100px; margin-top: 50px;"></span>
                        </p>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="slider">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>N.</th>
                                        <th>Image</th>
                                        <th>Titre</th>
                                        <th>Lien</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($slides as $slide)
                                        <tr>
                                            <td>{{ $slide->id }}</td>
                                            <td>
                                                <img style="max-width: 100%;" src="{{ asset('img/themes/slider/'. $slide->image_url ) }}" alt="">
                                            </td>
                                            <td>{{ $slide->titre }}</td>
                                            <td>{{ $slide->lien }}</td>
                                            <td><button class="btn btn-warning" data-toggle="modal" data-target="#update-slide"><span class="glyphicon glyphicon-pencil"></span> Modifier</button></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div role="tabpanel" class="tab-pane" id="opportunite">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>N.</th>
                                        <th>Image</th>
                                        <th>Titre</th>
                                        <th>Lien</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($opportunites as $opportunite)
                                        <tr>
                                            <td>{{ $opportunite->id }}</td>
                                            <td>
                                                <img style="max-width: 100%;" src="{{ asset('img/themes/opportunites/'. $opportunite->image_url ) }}" alt="">
                                            </td>
                                            <td>{{ $opportunite->titre }}</td>
                                            <td>{{ $opportunite->lien }}</td>
                                            <td><button class="btn btn-warning" data-toggle="modal" data-target="#update-slide"><span class="glyphicon glyphicon-pencil"></span> Modifier</button></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
    @include('modals.theme.update-slide')
@endsection