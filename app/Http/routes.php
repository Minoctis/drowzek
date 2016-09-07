<?php

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
    //Routes d'auth
    Route::get('connexion', ['as' => 'connexion', 'uses' => 'Auth\AuthController@showLoginForm']);
    Route::post('connexion', 'Auth\AuthController@login');
    Route::get('deconnexion', ['as' => 'deconnexion', 'uses' => 'Auth\AuthController@logout']);
    Route::get('deconnexion-confirmation', ['as' => 'confirmation-deconnexion', function() { return view('auth.deconnexion'); }]);

    Route::get('creation-compte', ['as' => 'creation-compte', 'uses' => 'Auth\AuthController@showRegistrationForm']);
    Route::post('creation-compte', 'Auth\AuthController@register');

    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');

    Route::get('/pages/{slug}', ['as' => 'page-static', 'uses' => 'Front\ProduitsController@showPageStatic']);

    Route::get('cgv',['as' => 'cgv', function() {return view('pages.cgv');}]);

    Route::get('livraison',['as' => 'livraison', function() {return view('pages.livraison');}]);

    Route::get('garantie',['as' => 'garantie', function() {return view('pages.garantie');}]);

    Route::get('plan-site',['as' => 'plan-site', 'uses' => 'Front\CatalogueController@showListeAmbiancesPlanSite' ]);

//Routes du front-office
    //Accueil
    Route::get('/', ['as' => 'accueil', 'uses' => 'Front\ProduitsController@showIndex']);

    //Page catégorie
    Route::get('creations/{slug}', ['as' => 'creations', 'uses' => 'Front\CatalogueController@showCategorie' ]);

    // page produit
    Route::get('produit/{slug}', ['as' => 'produit', 'uses' => 'Front\ProduitsController@showProduit']);

    Route::group(['prefix' => 'ambiances', 'as' => 'ambiances::'], function() {
    
        //Liste des ambiances
        Route::get('/', ['as' => 'liste', 'uses' => 'Front\CatalogueController@showListeAmbiances']);

        // fiche ambiance
        Route::get('/{slug}', ['as' => 'fiche', 'uses' => 'Front\CatalogueController@showAmbiance']);
    });

    Route::group(['prefix' => 'checkout', 'as' => 'checkout::', 'middleware' => 'auth'], function() {
        //Page 1 du tunnel, les adresses facturation et livraison
        Route::get('/adresses', ['as' => 'adresses', 'uses' => 'Front\PanierController@showAdresses']);

        //Page 2 du tunnel, les modes de livraison
        Route::get('/livraison', ['as' => 'livraison', 'uses' => 'Front\PanierController@showLivraison']);

        //Page 3 du tunnel, le paiement
        Route::get('/paiement', ['as' => 'paiement', 'uses' => 'Front\PanierController@showPaiement']);

        //Page 4 du tunnel, la confirmation
        Route::get('/confirmation', ['as' => 'confirmation', 'uses' => 'Front\PanierController@showConfirmation']);

    });

    // panier
    Route::get('panier', ['as' => 'panier', 'uses' => 'Front\PanierController@showPanier']);
    Route::post('ajout-panier', ['as' => 'ajout-panier', 'uses' => 'Front\PanierController@addProductToPanier']);
    Route::post('edit-panier', ['as' => 'edit-panier', 'uses' => 'Front\PanierController@editPanier']);

    //Routes du compte utlisateur
    Route::group(['prefix' => 'compte', 'as' => 'compte::', 'middleware' => 'auth'], function () {
        //compte utilisateur accueil
        Route::get('accueil', ['as' => 'accueil', 'uses' => 'Front\CompteController@showCompteClient']);
        Route::get('commande/{reference}', ['as' => 'detailCommande', 'uses' => 'Front\CompteController@detailCommande']);

        Route::post('info-utilisateur', ['as' => 'updateClient', 'uses' => 'Front\CompteController@updateCompteClient']);

        //Supprimer une adresse
        Route::delete('/{id}', ['as' => 'delete', 'uses' => 'Front\CompteController@deleteAdresse' ]);

        Route::post('add-adresse', ['as' => 'addAdresse', 'uses' => 'Front\CompteController@createAdresse']);
        Route::post('edit-adresse', ['as' => 'editAdresse', 'uses' => 'Front\CompteClientController@editAdresse']);

    });

//Routes du Back-office
    Route::group(['prefix' => 'admin', 'as' => 'admin::'], function () {

        //Dashboard
        Route::get('/', ['as' => 'dashboard', 'uses' => 'Admin\DashboardController@showDashboard']);

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
            Route::get('/', ['as' => 'liste', 'uses' => 'Admin\ProduitsController@listeProduits']);

            //Accueil - Recherche/Filtre produits
            Route::post('/recherche', ['as' => 'recherche', 'uses' => 'Admin\ProduitsController@rechercheProduit']);

            //Ajout de produit
            Route::get('ajouter', ['as' => 'add', 'uses' => 'Admin\ProduitsController@getAjouterProduit' ]);
            Route::post('ajouter', ['as' => 'add', 'uses' => 'Admin\ProduitsController@postAjouterProduit' ]);

            //Modifier un produit
            Route::get('modifier/{id}', ['as' => 'edit', 'uses' => 'Admin\ProduitsController@getModifierProduit' ]);
            Route::post('modifier/{id}', ['as' => 'edit', 'uses' => 'Admin\ProduitsController@postModifierProduit' ]);

            //Supprimer un produit
            Route::delete('/{id}', ['as' => 'delete', 'uses' => 'Admin\ProduitsController@deleteProduit' ]);
            Route::put('/{id}/restore', ['as' => 'restore', 'uses' => 'Admin\ProduitsController@restoreProduit' ]);

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
            Route::get('/', ['as' => 'liste', 'uses' => 'Admin\ClientsController@showClientList' ]);

            //Page client
            Route::get('/{client_id}', ['as' => 'details', 'uses' => 'Admin\ClientsController@showClient']);
            Route::post('/{client_id}', ['as' => 'update', 'uses' => 'Admin\ClientsController@updateClient']);
            Route::post('/{client_id}/adresse/{adresse_id}', ['as' => 'update', 'uses' => 'Admin\ClientsController@updateClientAdresse']);
        });

        //Routes des commandes
        Route::group(['prefix' => 'commandes', 'as' => 'commandes::'], function () {

            //Liste des commandes
            Route::get('/', ['as' => 'liste', 'uses' => 'Admin\CommandesController@showCommandesList' ]);

            //Page commande
            Route::get('/{commande_ref}', ['as' => 'details', 'uses' => 'Admin\CommandesController@showCommande']);

            //Update produit
            Route::post('/{commande_ref}/{commande_produit_libelle}', ['as' => 'update', 'uses' => 'Admin\CommandesController@updateProductCommande']);
        });

        //Routes des avis
        Route::group(['prefix' => 'avis', 'as' => 'avis::'], function () {

            //Accueil des avis
            Route::get('/', ['as' => 'liste', 'uses' => 'Admin\AvisController@showAvisList' ]);


            //Supprimer un avis
            Route::delete('/{id}', ['as' => 'delete', 'uses' => 'Admin\AvisController@deleteAvis' ]);

        });

        //Routes des promotions
        Route::group(['prefix' => 'promotions', 'as' => 'promotions::'], function () {

            //Accueil des promotions
            Route::get('/', ['as' => 'dashboard', function () { return view('pages.admin.promotions.dashboard'); } ]);

        });

        //Routes des pages
        Route::group(['prefix' => 'pages', 'as' => 'pages::'], function () {

            //Accueil du pages
            Route::get('/', ['as' => 'liste', 'uses' => 'Admin\PagesController@showListPages' ]);

            //Edit page
            Route::get('/{id}', ['as' => 'details', 'uses' => 'Admin\PagesController@showPage']);
            Route::post('/{id}', ['as' => 'update', 'uses' => 'Admin\PagesController@updatePage']);

        });

        //Routes du mailing
        Route::group(['prefix' => 'mailing', 'as' => 'mailing::'], function () {

            //Accueil du mailing
            Route::get('/', ['as' => 'dashboard', function () { return view('pages.admin.mailing.dashboard'); } ]);

        });

        //Routes du thème
        Route::group(['prefix' => 'theme', 'as' => 'theme::'], function () {

            //Accueil du thème
            Route::get('/', ['as' => 'liste', 'uses' => 'Admin\ThemeController@showThemeList' ]);
            Route::post('/{id}', ['as' => 'update', 'uses' => 'Admin\ThemeController@updateSlide']);

        });

        //Routes des rapports
        Route::group(['prefix' => 'rapports', 'as' => 'rapports::'], function () {

            //Accueil des rapports
            Route::get('/', ['as' => 'dashboard', function () { return view('pages.admin.rapports.dashboard'); } ]);

        });

    });
});
