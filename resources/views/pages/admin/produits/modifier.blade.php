@extends('layouts.admin')
@section('title', 'Modifier le produit : ' .$produit->nom)
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="admin-bloc">
                <div class="produit-header">
                    <div class="produit-statut">
                        <input class="bootstrap-switch-input" data-on-color="success" data-off-color="danger" type="checkbox" checked>
                    </div>
                    <div class="produit-delete">
                        <button class="btn btn-danger" data-toggle="modal" data-target="#delete-produit" onclick="openModalDeleteProduit({{ $produit->id }}, {{ '"'.$produit->nom.'"' }})"><span class="glyphicon glyphicon-trash"></span> Supprimer</button>
                    </div>
                </div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs produit-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#infos" aria-controls="home" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Informations</a></li>
                    <li role="presentation"><a href="#prix" aria-controls="profile" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-euro" aria-hidden="true"></span> Prix</a></li>
                    <li role="presentation"><a href="#images" aria-controls="profile" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Images</a></li>
                </ul>
                <form action="">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="infos">

                                <!-- Nom produit -->
                                <div class="form-group">
                                    <label class="control-label" for="civilite">Nom : <span>*</span></label>
                                    <input class="form-control" id="civilite" name="civilite" type="text" value="{{$produit->nom}}" required>
                                </div>

                                <!-- Dimension produit -->
                                <div class="form-group">
                                    <label class="control-label" for="civilite">Dimensions : <span>*</span></label>
                                    <input class="form-control" id="civilite" name="civilite" type="text" value="{{$produit->dimensions}}" required>
                                </div>

                                <!-- description produit -->
                                <div class="form-group">
                                    <label class="control-label" for="civilite">Descripiton : <span>*</span></label>
                                    <textarea class="form-control" id="civilite" name="civilite" type="text" rows="5" required>{{$produit->description}}</textarea>
                                </div>

                                <!-- catégorie produit -->
                                <label class="control-label" for="civilite">Catégorie : <span>*</span></label>
                                <select name="categorie" id="categorie" class="form-control" required>
                                    @foreach($categories as $categorie)
                                        <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                                    @endforeach
                                </select>


                        </div>
                        <div role="tabpanel" class="tab-pane" id="prix">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nom de l'option</th>
                                        <th>Image</th>
                                        <th>Prix HT</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $produit->options as $option)
                                        <tr>
                                            <td>{{ $option->libelle }}</td>
                                            <td>{{ $option->img_name }}</td>
                                            <td>{{ $option->prix_ht }}</td>
                                            <td><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Supprimer cette option</button></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="images">

                            <p>Ici les images</p>
                        </div>


                        <!-- Bouton valider -->
                        <div class="form-group submit-button submit-produit">
                            <input class="hdg-button-small" id="submit" name="submit" type="submit" value="Mettre à jour les informations" />
                        </div>

                    </div>

                </form>

            </div>

        </div>
    </div>

    <script>
        $(function(argument) {
            $('.bootstrap-switch-input').bootstrapSwitch();
        })
    </script>

@endsection