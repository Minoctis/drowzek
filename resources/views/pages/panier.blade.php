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
        <div class="top-panier">
            <div class="achat"><i class="fa fa-chevron-left" aria-hidden="true"></i> <a class="link" href="#">continuer mes achats</a></div>
            <a class="link" href="{{ route('checkout::adresses') }}"><div class=" securise hdg-button-default">commande securisé</div></a>
            <!-- <a class="hdg-button-default">commande securisé</a>-->
        </div>

               <table class="table table-striped">
                   <thead>
                       <tr>
                         <th>Description de l'article</th>
                         <th>Option de produit</th>
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
                                    <span><a class="link" href="#">Sauvegarder</a> <span> | </span> <a class="link" href="#">supprimer</a></span>
                                </div>
                            </div>

                        </td>
                        <td>
                            <div class="middle-content">
                                Matières : {{ $produit->libelle }}<br>quantité : {{ $quantites[$produit->id] }}
                                <p class="button-update"><a class="link" href="#">Modifier les options</a></p>
                            </div>
                        </td>

                        <td>
                            <div class="right-content">
                                {{ round(($produit->prix_ht + $produit->prix_ht * $produit->tauxTva->valeur / 100) * $quantites[$produit->id], 2) }} €
                            </div>
                        </td>

                      </tr>
                    @endforeach
                  </tbody>
            </table>
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
                                        <option value="17">17</option>
                                        <option value="100">100</option>
                                    </select>
                                </td>
                                <td>17 €</td>
                            </tr>
                            <tr>
                                <td>Total HT :</td>
                                <td>89 €</td>
                            </tr>
                            <tr>
                                <td>Total TTC :</td>
                                <td>9898 €</td>
                            </tr>
                            <tr>
                                <td>Dont TVA :</td>
                                <td>98 €</td>
                            </tr>

                            <!-- Montant Total -->
                            <tr class="last">
                                <td>Montant Total :</td>
                                <td>8989 €</td>
                            </tr>
                            <!-- Fin Montant Total -->

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-panier">
            <div class="achat"><i class="fa fa-chevron-left" aria-hidden="true"></i> <a class="link" href="#">continuer mes achats</a></div>
            <a class="link" href="{{ route('checkout::adresses') }}"><div class=" securise hdg-button-default">commande securisé</div></a>
            <!-- <a class="hdg-button-default">commande securisé</a>-->
        </div>

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