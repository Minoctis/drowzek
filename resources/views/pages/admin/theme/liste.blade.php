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
                                            <td><button class="btn btn-warning" data-toggle="modal" data-target="#update-slide-{{ $slide->id }}" <span class="glyphicon glyphicon-pencil"></span> Modifier</button></td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="update-slide-{{ $slide->id }}" tabindex="-1" role="dialog" aria-labelledby="update-slide-label">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="update-slide-label">Modifier un slides</h4>
                                                    </div>
                                                    <form action="/admin/theme/{{ $slide->id }}" method="POST">
                                                        {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        <div class="form-update-slide">

                                                                <!-- Image -->
                                                                <div class="form-group">
                                                                    <label class="control-label" for="image">Ajouter une nouvelle image : <span>*</span></label>
                                                                    <input type="file" name="img">
                                                                </div>

                                                                <!-- Titre -->
                                                                <div class="form-group">
                                                                    <label class="control-label" for="titre">Titre : <span>*</span></label><br>
                                                                    <input type="text" value="{{ $slide->titre }}" name="titre">
                                                                </div>

                                                                <!-- Lien -->
                                                                <div class="form-group">
                                                                    <label class="control-label" for="lien">Lien : <span>*</span></label><br>
                                                                    <input type="text" value="{{ $slide->lien }}" name="lien">
                                                                </div>


                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="pull-right">
                                                            <button class="btn bnt-default" data-dismiss="modal">Annuler</button>
                                                            <!-- Bouton valider -->
                                                            <div class="form-group submit-button" style="float: right;">
                                                                <input class="hdg-button-small" id="submit" name="submit" type="submit" value="Mettre à jour" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
                                            <td><button class="btn btn-warning" data-toggle="modal" data-target="#update-opportunite-{{ $opportunite->id }}"><span class="glyphicon glyphicon-pencil"></span> Modifier</button></td>
                                        </tr>
                                        <div class="modal fade" id="update-opportunite-{{ $opportunite->id }}" tabindex="-1" role="dialog" aria-labelledby="update-opportunite-label">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="update-slide-label">Modifier l'opportunité</h4>
                                                    </div>
                                                    <form action="/admin/theme/{{ $opportunite->id }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <div class="modal-body">
                                                            <div class="form-update-slide">

                                                                <!-- Image -->
                                                                <div class="form-group">
                                                                    <label class="control-label" for="image">Ajouter une nouvelle image : <span>*</span></label>
                                                                    <input type="file" name="img">
                                                                </div>

                                                                <!-- Titre -->
                                                                <div class="form-group">
                                                                    <label class="control-label" for="titre">Titre : <span>*</span></label><br>
                                                                    <input type="text" value="{{ $opportunite->titre }}" name="titre">
                                                                </div>

                                                                <!-- Lien -->
                                                                <div class="form-group">
                                                                    <label class="control-label" for="lien">Lien : <span>*</span></label><br>
                                                                    <input type="text" value="{{ $opportunite->lien }}" name="lien">
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="pull-right">
                                                                <button class="btn bnt-default" data-dismiss="modal">Annuler</button>
                                                                <!-- Bouton valider -->
                                                                <div class="form-group submit-button" style="float: right;">
                                                                    <input class="hdg-button-small" id="submit" name="submit" type="submit" value="Mettre à jour" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection