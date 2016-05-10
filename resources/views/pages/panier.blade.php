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
                       <tr>

                        <td> 
                        	<img src="http://placehold.it/100x100/999999/cccccc"class="bloc-img">
                        	<div class="bloc-text">
                        		<p>chaise design en bois</p>
                        	categorie: chaise<br>
                        	disponible en plusieurs coloris<br>
                        	<span><a class="link" href="#">Sauvegarder</a>|<a class="link" href="#">supprimer</a></span>
                        </div>
                        </td>

                        <td>Matières : bois<br>
                        quantité : 2
                       <p><a class="link" href="#">Modifier les options</a></p>
                     </td>

                        <td>1390</td>

                      </tr>

                       <tr>
                        <td><img src="http://placehold.it/100x100/999999/cccccc"class="bloc-img">
                        	<div class="bloc-text">
                        	<p>fauteuil</p>
                        	categorie: chaise<br>
                        	disponible en plusieurs coloris<br>
                        	<span><a class="link" href="#">Sauvegarder</a>|<a class="link" href="#">supprimer</a></span>
                        	</div>
                        </td>

                        <td>Matières : cuir</td>
                        <td>500</td>
                     </tr>

                      
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