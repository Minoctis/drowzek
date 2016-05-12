@extends('layouts.default')

@section('title', 'Page d\'accueil')

@section('page-id', 'panier')

@section('breadcrumbs')
    <li class="active">Mon panier</li>
    @endsection

@section('content')
<!-- Ajouter contenu pour la page panier -->
<div class="panier">
    <div class="entete-page">
        <img src="{{ asset('img/themes/header-compte.jpg') }}" class="img img-reponsive" alt="Mon Compte">
        <h1 class="page-title">Mon panier</h1>
    </div>
	<div class="container">
        @if($produits->count() !== 0)
        <div class="top-panier">
            <div class="achat"><i class="fa fa-chevron-left" aria-hidden="true"></i> <a class="link" href="#">continuer mes achats</a></div>
            <a class="link" href="{{ route('checkout::adresses') }}"><div class=" securise hdg-button-default">commande securisé</div></a>
            <!-- <a class="hdg-button-default">commande securisé</a>-->
        </div>
        @endif
        @if($produits->count() !== 0)
        <div class="table-responsive">
            <table class="table table-striped">
                       <thead>
                           <tr>
                             <th>Description de l'article</th>
                             <th>Option de produit</th>
                               <th>Prix unitaire (HT)</th>
                              <th>Prix</th>
                          </tr>
                      </thead>
                       <tbody>
                       @foreach($produits as $produit)
                           <tr>
                            <td>
                                <div class="left-content">
                                    <div class="mini-img">
                                        <img src="{{ $produit->produit->images->count() !== 0 ? 'img/products/'.$produit->produit->images[0]->img_name : 'http://placehold.it/100x100/999999/cccccc' }}"class="bloc-img">
                                    </div>
                                    <div class="bloc-text">
                                        <p>{{ $produit->produit->nom }}</p>
                                        categorie: {{ $produit->produit->categorie->nom }}<br>
                                        disponible en plusieurs coloris<br>
                                        <span><a class="link" href="#">Sauvegarder</a> <span> | </span> <a class="link delete-produit" data-id="{{ $produit->id }}" href="#">supprimer</a></span>
                                    </div>
                                </div>

                            </td>
                            <td>
                                <div class="middle-content show-produit-detail">
                                    Matières : {{ $produit->libelle }}<br>
                                    quantité : <span class="quantite-value">{{ $quantites[$produit->id] }}</span><br>
                                    TVA: <span class="tva-value">{{ $produit->tauxTva->valeur }}</span> %
                                    <p class="button-update-produit-detail"><a class="link" href="#">Modifier les options</a></p>
                                </div>
                                <div class="middle-content edit-produit-detail" style="display: none;">
                                    <div class="form-group">
                                        <label for="option-{{ $produit->id }}">Matière :</label>
                                        <select  class="pull-right" name="option-{{ $produit->produit->id }}" id="option-{{ $produit->produit->id }}">
                                            <option value="{{ $produit->id }}">{{ $produit->libelle }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantite-{{ $produit->id }}">Quantité :</label>
                                        <input size="2" type="number" value="{{ $quantites[$produit->id] }}" class="pull-right text-center" style="width: 40px;">
                                    </div>
                                    <button class="hdg-button-small annuler-edit-detail">Annuler</button>
                                    <button class="hdg-button-small pull-right valider-edit-detail">Mettre à jour</button>
                                </div>
                            </td>
                            <td>
                                <div class="middle-content prix-ht-value">
                                    {{ $produit->prix_ht }} €
                                </div>
                            </td>
                            <td>
                                <div class="right-content prix-total-produit">
                                    {{ round(($produit->prix_ht + $produit->prix_ht * $produit->tauxTva->valeur / 100) * $quantites[$produit->id], 2) }} €
                                </div>
                            </td>

                          </tr>
                        @endforeach
                      </tbody>
                </table>
            </div>
        <div class="recap-commande">
            <div class="row">
                <div class="sub-title-content-commande col-md-4 col-xs-12">
                    <div class="actions-panier">
                        <span><a class="link" href="#">Sauvegarder</a> <span> | </span> <a class="link" href="#">supprimer</a></span>
                    </div>
                    <div class="code-promo">
                        <span><a class="link" href="#">Code remise ou promotion ?</a> <span>
                    </div>
                </div>
                <div class="recap-infos col-md-8 col-xs-12">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>
                                    <select name="shipping" id="shipping">
                                        <option value="17">Livraison à domicile</option>
                                        <option value="100">Transporteur privé</option>
                                    </select>
                                </td>
                                <td><span id="shipping-value">17</span> €</td>
                            </tr>
                            <tr>
                                <td>Total HT :</td>
                                <td><span id="total-ht">{{ round($total_ht, 2) }}</span> €</td>
                            </tr>
                            <tr>
                                <td>Total TTC :</td>
                                <td><span id="total-TTC">{{ round($total_ht, 2) + round($total_tva, 2) }}</span> €</td>
                            </tr>
                            <tr>
                                <td>Dont TVA :</td>
                                <td><span id="total-tva">{{ round($total_tva, 2) }}</span> €</td>
                            </tr>

                            <!-- Montant Total -->
                            <tr class="last">
                                <td>Montant Total :</td>
                                <td><span id="grand-total">{{ round($total_ht, 2) + round($total_tva, 2) + 17 }}</span> €</td>
                            </tr>
                            <!-- Fin Montant Total -->

                        </table>
                    </div>
                </div>
            </div>
        </div>
        @else
            <p>Votre panier ne contient pas de produits.</p>
        @endif
        @if($produits->count() !== 0)
        <div class="bottom-panier">
            <div class="achat"><i class="fa fa-chevron-left" aria-hidden="true"></i> <a class="link" href="#">continuer mes achats</a></div>
            <a class="link" href="{{ route('checkout::adresses') }}"><div class=" securise hdg-button-default">commande securisé</div></a>
            <!-- <a class="hdg-button-default">commande securisé</a>-->
        </div>
        @endif
        <div class="panier-bottom">
                <div class="selected-product">
                    <div class="row">
                        <h3 class="selected-product-title">Produits sélectionnés pour vous</h3>
                        @for ($i = 0; $i < 4; $i++)

                            @include('elements.related-product')

                        @endfor
                    </div>
                </div>
        </div>
   </div>

</div>
@endsection