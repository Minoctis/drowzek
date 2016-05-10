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
                                    <span><a class="link" href="#">Sauvegarder</a>|<a class="link" href="#">supprimer</a></span>
                                </div>
                            </div>

                        </td>
                        <td>Matières : {{ $produit->libelle }}<br>quantité : {{ $quantites[$produit->id] }}
                            <p><a class="link" href="#">Modifier les options</a></p>
                        </td>

                        <td>{{ round(($produit->prix_ht + $produit->prix_ht * $produit->tauxTva->valeur / 100) * $quantites[$produit->id], 2) }} €</td>

                      </tr>
                    @endforeach
                  </tbody>
            </table>

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