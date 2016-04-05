<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use App\Models\Ambiance;
use App\Models\Categorie;

Route::group(['middleware' => ['web']], function () {
//Routes du front-office

    //Accueil
    Route::get('/', ['as' => 'accueil', 'uses' => 'Front\ProduitsController@showIndex']);

    //Page catégorie
    Route::get('creations/{slug}', ['as' => 'creations', 'uses' => 'Front\CatalogueController@showCategorie' ]);

    // page produit
    Route::get('produit/{slug}', ['as' => 'produit', 'uses' => 'Front\ProduitsController@showProduit']);

    // page de connexion
    Route::get('connexion', ['as' => 'connexion', function() {return view('pages.connexion'); }]);

    // page de création compte
    Route::get('creation-compte', ['as' => 'creation-compte', function() {return view('pages.creation-compte'); }]);

    Route::group(['prefix' => 'ambiances', 'as' => 'ambiances::'], function() {
    
        //Liste des ambiances
        Route::get('/', ['as' => 'liste', 'uses' => 'Front\CatalogueController@showListeAmbiances']);

        // fiche ambiance
        Route::get('/{slug}', ['as' => 'fiche', 'uses' => 'Front\CatalogueController@showAmbiance']);
    });

    Route::group(['prefix' => 'checkout', 'as' => 'checkout::'], function() {
        //Page 1 du tunnel, les adresses facturation et livraison
        Route::get('/adresses', ['as' => 'adresses', function() {return view('pages.checkout.adresses'); }]);

        //Page 2 du tunnel, les modes de livraison
        Route::get('/livraison', ['as' => 'livraison', function() {return view('pages.checkout.livraison'); }]);

        //Page 3 du tunnel, le paiement
        Route::get('/paiement', ['as' => 'paiement', function() {return view('pages.checkout.paiement'); }]);

        //Page 4 du tunnel, la confirmation
        Route::get('/confirmation', ['as' => 'confirmation', function() {return view('pages.checkout.confirmation'); }]);

    });

    // panier
    Route::get('panier', ['as' => 'panier', function() {return view('pages.panier'); }]);

    //Routes du compte utlisateur
    Route::group(['prefix' => 'compte', 'as' => 'compte::'], function () {

        //compte utilisateur accueil
        Route::get('accueil', ['as' => 'accueil', function() {return view('pages.compte.accueil'); }]);

    });

//Routes du Back-office
    Route::group(['prefix' => 'admin', 'as' => 'admin::'], function () {

        //Dashboard
        Route::get('/', ['as' => 'dashboard', function () { return view('pages.admin.dashboard'); }]);

        //Login
        Route::get('login', ['as' => 'login', function () {} ]);

        //Routes du profil administrateur
        Route::group(['prefix' => 'profil', 'as' => 'profil::'], function () {

            //Profil administrateur
            Route::get('/', ['as' =>'show', function () {} ]);

            //Modifier le profil
            Route::get('modifier', [ 'as' => 'edit', function () {} ]);

        });

        //Routes des produits
        Route::group(['prefix' => 'produits', 'as' => 'produits::'], function () {

            //Accueil - Liste des produits
            Route::get('/', ['as' => 'liste', function () { return view('pages.admin.produits.liste'); }]);

            //Accueil - Recherche/Filtre produits
            Route::post('/', ['as' => 'recherche', function () {} ]);

            //Ajout de produit
            Route::get('ajouter', ['as' => 'add', function () {} ]);
            Route::post('ajouter', ['as' => 'add', function () {} ]);

            //Modifier un produit
            Route::get('modifier/{id}', ['as' => 'edit', function ($id) {} ]);
            Route::post('modifier/{id}', ['as' => 'edit', function ($id) {} ]);

            //Supprimer un produit
            Route::post('supprimer/{id}', ['as' => 'delete', function ($id) {} ]);

            //Prévisualisation - Ajout/Modification
            Route::post('previsualisation', ['as' => 'preview', function () {} ]);

            //Modification des images
            Route::post('images/{id}', ['as' => 'images',function ($id) {} ]);

        });

        //Routes des caractéristiques catalogue
        Route::group(['prefix' => 'catalogue', 'as' => 'catalogue::'], function () {

            //Accueil du catalogue
            Route::get('/', ['as' => 'dashboard' , 'uses' => 'Admin\CatalogueController@dashboard']);

            //Routes des catégories
            Route::group(['prefix' => 'categories', 'as' => 'categories::'], function () {

                //Liste des catégories
                Route::get('/', ['as' => 'liste', function () { return view('pages.admin.catalogue.categories.accueil'); }]);

                //Ajouter une catégorie
                Route::get('ajouter', ['as' => 'add', function () { return view('pages.admin.catalogue.categories.add');} ]);
                Route::post('ajouter', ['uses' => 'Admin\CatalogueController@addCategorie']);

                //Modifier une catégorie
                Route::get('modifier/{id}', ['as' => 'edit', function ($id) {
                    $categorie = Categorie::find($id);
                    return view('pages.admin.catalogue.categories.edit', ['categorie' => $categorie]);
                } ]);
                Route::put('modifier/{id}', ['as' => 'edit', 'uses' => 'Admin\CatalogueController@editCategorie']);
                //Modifier l'ordre des catégories
                Route::post('ordre', ['as' => 'ordre', 'uses' => 'Admin\CatalogueController@updateOrdreCategories']);

                //Supprimer une catégorie
                Route::delete('supprimer/{id}', ['as' => 'delete' ,function ($id) {} ]);

            });

            //Routes des ambiances
            Route::group(['prefix' => 'ambiances', 'as' => 'ambiances::'], function () {

                //Liste des ambiances
                Route::get('/', ['as' => 'liste', function () { return view('pages.admin.catalogue.ambiances.liste'); }]);

                //Ajouter une ambiance
                Route::get('add', ['as' => 'add', function () { return view('pages.admin.catalogue.ambiances.add'); }]);
                Route::post('add', ['uses' => 'Admin\CatalogueController@addAmbiance']);

                //Modifier une ambiance
                Route::get('edit/{id}', ['as' => 'edit', function($id) {
                    $ambiance = Ambiance::find($id);
                    return view('pages.admin.catalogue.ambiances.edit', ['ambiance' => $ambiance]);
                }]);
                Route::post('edit/{id}', ['uses' => 'Admin\CatalogueController@editAmbiance']);
                //Modifier l'ordre des catégories
                Route::post('ordre', ['as' => 'ordre', 'uses' => 'Admin\CatalogueController@updateOrdreAmbiances']);
            });

        });

        //Routes des clients
        Route::group(['prefix' => 'clients', 'as' => 'clients::'], function () {

            //Liste des clients
            Route::get('/', ['as' => 'liste', function () { return view('pages.admin.clients.liste'); } ]);

        });

        //Routes des commandes
        Route::group(['prefix' => 'commandes', 'as' => 'commandes::'], function () {

            //Liste des commandes
            Route::get('/', ['as' => 'liste', function () { return view('pages.admin.commandes.liste'); } ]);

        });

        //Routes des avis
        Route::group(['prefix' => 'avis', 'as' => 'avis::'], function () {

            //Accueil des avis
            Route::get('/', ['as' => 'dashboard', function () { return view('pages.admin.avis.dashboard'); } ]);

        });

        //Routes des promotions
        Route::group(['prefix' => 'promotions', 'as' => 'promotions::'], function () {

            //Accueil des promotions
            Route::get('/', ['as' => 'dashboard', function () { return view('pages.admin.promotions.dashboard'); } ]);

        });

        //Routes des pages
        Route::group(['prefix' => 'pages', 'as' => 'pages::'], function () {

            //Accueil du pages
            Route::get('/', ['as' => 'dashboard', function () { return view('pages.admin.pages.dashboard'); } ]);

        });

        //Routes du mailing
        Route::group(['prefix' => 'mailing', 'as' => 'mailing::'], function () {

            //Accueil du mailing
            Route::get('/', ['as' => 'dashboard', function () { return view('pages.admin.mailing.dashboard'); } ]);

        });

        //Routes du thème
        Route::group(['prefix' => 'theme', 'as' => 'theme::'], function () {

            //Accueil du thème
            Route::get('/', ['as' => 'dashboard', function () { return view('pages.admin.theme.dashboard'); } ]);

        });

        //Routes des rapports
        Route::group(['prefix' => 'rapports', 'as' => 'rapports::'], function () {

            //Accueil des rapports
            Route::get('/', ['as' => 'dashboard', function () { return view('pages.admin.rapports.dashboard'); } ]);

        });

    });
});
