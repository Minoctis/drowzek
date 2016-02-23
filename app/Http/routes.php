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

//Routes du front-office

//Accueil
Route::get('/', function () {
    return view('pages.front');
});



//Routes du Back-office
Route::group(['prefix' => 'admin'], function () {

    //Dashboard
    Route::get('/', function () {

    });

    //Login
    Route::get('login', function () {

    });

    //Routes du profil administrateur
    Route::group(['prefix' => 'profil'], function () {

        //Profil administrateur
        Route::get('/', function () {

        });

        //Modifier le profil
        Route::get('modifier', function () {

        });

        Route::post('modifier', function () {

        });

    });

    //Routes des produits
    Route::group(['prefix' => 'produits'], function () {

        //Accueil - Liste des produits
        Route::get('/', function () {

        });

        //Accueil - Recherche/Filtre produits
        Route::post('/', function () {

        });
        
        //Ajout de produit
        Route::get('ajouter', function () {
            
        });

        Route::post('ajouter', function () {

        });
        
        //Modifier un produit
        Route::get('modifier/{id}', function () {
            
        });

        Route::post('modifier/{id}', function () {

        });

        //Supprimer un produit
        Route::post('supprimer/{id}', function () {

        });

        //Prévisualisation - Ajout/Modification
        Route::post('previsualisation', function () {

        });

        //Modification des images
        Route::post('images/{id}', function () {

        });

    });

    //Routes des caractéristiques catalogue
    Route::group(['prefix' => 'catalogue'], function () {

        //Accueil - Liste des catégories / ambiances
        Route::get('/', function () {

        });

        //Routes des catégories
        Route::group(['prefix' => 'categories'], function () {

            //Ajouter une catégorie
            Route::get('ajouter', function () {

            });

            Route::post('ajouter', function () {

            });

            //Modifier une catégorie
            Route::get('modifier/{id}', function () {

            });

            Route::post('modifier/{id}', function () {

            });

            //Supprimer une catégorie
            Route::post('supprimer', function () {

            });

        });

        //Routes des ambiances
        Route::group(['prefix' => 'ambiances'], function () {

        });

    });

    //Routes des clients
    Route::group(['prefix' => 'clients'], function () {

    });

    //Routes des commandes
    Route::group(['prefix' => 'commandes'], function () {

    });

    //Routes des promotions
    Route::group(['prefix' => 'promotions'], function () {

    });

    //Routes des commentaires
    Route::group(['prefix' => 'commentaires'], function () {

    });

    //Routes du mailing
    Route::group(['prefix' => 'mailing'], function () {

    });

    //Routes des rapports
    Route::group(['prefix' => 'rapports'], function () {

    });

});

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

Route::group(['middleware' => ['web']], function () {
    //
});
