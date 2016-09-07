@extends('layouts.admin')
@section('title', 'Modifier le produit : ' .$produit->nom)
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="admin-bloc">
                <form method="POST">
                    <div class="is-new">
                        <p>Marquer ce produit comme une nouveauté ?</p>

                        <label>Oui</label>
                        <input type="radio" name="isNew" value="1" {{ $produit->is_new ? 'checked' : '' }}>

                        <label>Non</label>
                        <input type="radio" name="isNew" value="0" {{ $produit->is_new ? '' : 'checked' }}>
                        <span class="informations"><span class="glyphicon glyphicon-info-sign"></span> Cela vous permet de rendre le produit visible sur la page d'accueil.</span>
                    </div>
                    <div class="produit-header">
                        <div class="produit-statut">
                            <input class="bootstrap-switch-input" data-on-color="success" data-off-color="danger" type="checkbox" checked>
                        </div>
                        {{--<div class="produit-delete">--}}
                            {{--<button class="btn btn-danger" data-toggle="modal" data-target="#delete-produit" onclick="openModalDeleteProduit({{ $produit->id }}, {{ '"'.$produit->nom.'"' }})"><span class="glyphicon glyphicon-trash"></span> Supprimer</button>--}}
                        {{--</div>--}}
                    </div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs produit-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#infos" aria-controls="home" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Informations</a></li>
                        <li role="presentation"><a href="#prix" aria-controls="profile" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-euro" aria-hidden="true"></span> Prix</a></li>
                        <li role="presentation"><a href="#images" aria-controls="profile" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Images</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="infos">

                                <!-- Nom produit -->
                                <div class="form-group">
                                    <label class="control-label" for="nom">Nom : <span>*</span></label>
                                    <input class="form-control" id="nom" name="nom" type="text" value="{{$produit->nom}}" required>
                                </div>

                                <!-- Nom produit -->
                                <div class="form-group">
                                    <label class="control-label" for="slug">Chemin : <span>*</span></label>
                                    <input class="form-control" id="slug" name="slug" type="text" value="{{$produit->slug}}" required>
                                </div>

                                <!-- Dimension produit -->
                                <div class="form-group">
                                    <label class="control-label" for="dimension">Dimensions : <span>*</span></label>
                                    <input class="form-control" id="dimension" name="dimension" type="text" value="{{$produit->dimensions}}" required>
                                </div>

                                <!-- description produit -->
                                <div class="form-group">
                                    <label class="control-label" for="description">Descripiton : <span>*</span></label>
                                    <textarea class="form-control" id="description" name="description" type="text" rows="5" required>{{$produit->description}}</textarea>
                                </div>

                                <!-- catégorie produit -->
                                <label class="control-label" for="categorie">Catégorie : <span>*</span></label>
                                <select name="categorie" id="categorie" class="form-control" required>
                                    @foreach($categories as $categorie)
                                        <optgroup label="{{ $categorie->nom }}">
                                            @foreach($categorie->children as $child)
                                                <option value="{{ $child->id }}" {{ $produit->categorie_id === $child->id ? 'selected' : '' }}>{{ $child->nom }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>


                        </div>
                        <div role="tabpanel" class="tab-pane" id="prix">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="add-option pull-right">
                                        <button class="btn btn-default">Ajouter une option</button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nom de l'option</th>
                                        <th>Image</th>
                                        <th>Prix HT</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $produit->options as $option)
                                        <tr>
                                            <td>{{ $option->libelle }}</td>
                                            <td class="produit-image-options-admin"><img src="{{ '/img/products/options/'.$option->img_name }}" alt=""></td>
                                            <td>{{ $option->prix_ht }}</td>
                                            <td>
                                                <div class="pull-right">
                                                    <button class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="pull-right">
                                                    <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Supprimer cette option</button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div role="tabpanel" class="tab-pane" id="images">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="add-option pull-right">
                                        <button class="btn btn-default">Ajouter une image</button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Ordre</th>
                                        <th>Image</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $produit->images as $image)
                                        <tr>
                                            <td>{{ $image->ordre }}</td>
                                            <td>
                                                <div class="image-produit-bo">
                                                    <img src="{{ '/img/products/'.$image->img_name }}" alt="">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="pull-right">
                                                    <button class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Mettre à jour</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="pull-right">
                                                    <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Supprimer cette image</button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <!-- Bouton valider -->
                        <div class="form-group submit-button submit-produit pull-right">
                            <input class="hdg-button-small" id="submit" name="submit" type="submit" value="Mettre à jour les informations" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('modals.produits.delete')
    <script>
        $(function(argument) {
            $('.bootstrap-switch-input').bootstrapSwitch();
        })
    </script>

@endsection