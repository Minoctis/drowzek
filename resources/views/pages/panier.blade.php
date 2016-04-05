@extends('layouts.default')

@section('title', 'Page d\'accueil')

@section('page-id', 'panier')

@section('content')
<!-- Ajouter contenu pour la page panier -->
<div class="panier">
	<div class="achat"><a class="link" href="#">continuer mes achats</a></div>
	<a class="link" href="#"><div class="securise">commande securisé</div></a>
<!-- <a class="hdg-button-default">commande securisé</a>-->
	<div class="container">
                  
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
   </div>
  
  <div class="achat">continuer mes achats</div>
	<div class="securise">commande securisé</div>

</div>
@endsection