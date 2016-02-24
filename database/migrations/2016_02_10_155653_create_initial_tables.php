<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateInitialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('civilites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->timestamps();
        });

        Schema::create('adresse_type', function(Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->timestamps();
        });

        Schema::create('pays', function(Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->timestamps();
        });

        Schema::create('paiement_type', function(Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->timestamps();
        });

        Schema::create('reduction_type', function(Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->timestamps();
        });

        Schema::create('promotion_type', function(Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->timestamps();
        });

        Schema::create('panier_type', function(Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->timestamps();
        });

        Schema::create('taux_tva', function(Blueprint $table) {
            $table->increments('id');
            $table->float('valeur');
            $table->timestamps();
        });

        Schema::create('categories', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('img_name');
            $table->integer('ordre');
            $table->string('slug');
            $table->integer('parent_id')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('categories');
        });

        Schema::create('ambiances', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->text('description');
            $table->integer('ordre');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('ambiances_img', function(Blueprint $table) {
            $table->increments('id');
            $table->string('img_name');
            $table->integer('ordre');
            $table->integer('ambiance_id')->unsigned();
            $table->timestamps();

            $table->foreign('ambiance_id')->references('id')->on('ambiances');
        });

        Schema::create('codes_promo', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->integer('valeur');
            $table->integer('promotion_type_id')->unsigned();
            $table->timestamps();

            $table->foreign('promotion_type_id')->references('id')->on('promotion_type');
        });

        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prenom');
            $table->string('nom');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('date_inscription');
            $table->date('date_naissance')->nullable();
            $table->string('token_forget_password')->nullable();
            $table->integer('civilite_id')->unsigned();
            $table->timestamps();

            $table->foreign('civilite_id')->references('id')->on('civilites');
        });

        Schema::create('adresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_carnet_adresse');
            $table->string('adresse');
            $table->string('compl_adresse')->nullable();
            $table->string('societe')->nullable();
            $table->string('cp');
            $table->string('ville');
            $table->string('nom_livraison')->nullable();
            $table->string('prenom_livraison')->nullable();
            $table->string('telephone')->nullable();
            $table->integer('client_id')->unsigned();
            $table->integer('adresse_type_id')->unsigned();
            $table->integer('pays_id')->unsigned();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('adresse_type_id')->references('id')->on('adresse_type');
            $table->foreign('pays_id')->references('id')->on('pays');
        });

        Schema::create('reductions', function(Blueprint $table) {
            $table->increments('id');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->float('valeur');
            $table->integer('promotion_type_id')->unsigned();
            $table->integer('reduction_type_id')->unsigned();
            $table->timestamps();

            $table->foreign('promotion_type_id')->references('id')->on('promotion_type');
            $table->foreign('reduction_type_id')->references('id')->on('reduction_type');
        });

        Schema::create('produits', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->text('description');
            $table->string('dimensions')->nullable();
            $table->string('slug');
            $table->integer('categorie_id')->unsigned();
            $table->integer('ambiance_id')->unsigned();
            $table->integer('reduction_id')->unsigned();
            $table->timestamps();

            $table->foreign('categorie_id')->references('id')->on('categories');
            $table->foreign('ambiance_id')->references('id')->on('ambiances');
            $table->foreign('reduction_id')->references('id')->on('reductions');
        });

        Schema::create('produits_img', function(Blueprint $table) {
            $table->increments('id');
            $table->string('img_name');
            $table->integer('ordre');
            $table->integer('produit_id')->unsigned();
            $table->timestamps();

            $table->foreign('produit_id')->references('id')->on('produits');
        });

        Schema::create('produits_associes', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('produit_1')->unsigned();
            $table->integer('produit_2')->unsigned();
            $table->timestamps();

            $table->foreign('produit_1')->references('id')->on('produits');
            $table->foreign('produit_2')->references('id')->on('produits');
        });

        Schema::create('produit_options', function(Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->string('img_name');
            $table->float('prix_ht');
            $table->integer('produit_id')->unsigned();
            $table->integer('taux_tva_id')->unsigned();
            $table->timestamps();

            $table->foreign('produit_id')->references('id')->on('produits');
            $table->foreign('taux_tva_id')->references('id')->on('taux_tva');
        });

        Schema::create('paniers', function(Blueprint $table) {
            $table->increments('id');
            $table->date('date_creation');
            $table->integer('client_id')->unsigned();
            $table->integer('panier_type_id')->unsigned();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('panier_type_id')->references('id')->on('panier_type');
        });

        Schema::create('paniers_has_produits', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('panier_id')->unsigned();
            $table->integer('produit_option_id')->unsigned();
            $table->timestamps();

            $table->foreign('panier_id')->references('id')->on('paniers');
            $table->foreign('produit_option_id')->references('id')->on('produit_options');
        });

        Schema::create('commandes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('reference');
            $table->dateTime('date');
            $table->string('adresse_facturation');
            $table->string('compl_adresse_facturation')->nullable();
            $table->string('cp_facturation');
            $table->string('ville_facturation');
            $table->string('telephone_facturation');
            $table->string('prenom_livraison')->nullable();
            $table->string('nom_livraison')->nullable();
            $table->string('societe_livraison')->nullable();
            $table->string('adresse_livraison');
            $table->string('compl_adresse_livraison')->nullable();
            $table->string('cp_livraison');
            $table->string('ville_livraison');
            $table->string('telephone_livraison');
            $table->float('frais_de_port');
            $table->string('code_promo_libelle')->nullable();
            $table->float('code_promo_valeur')->nullable();
            $table->integer('code_promo_type_id')->nullable()->unsigned();
            $table->integer('pays_livraison_id')->unsigned();
            $table->integer('pays_facturation_id')->unsigned();
            $table->integer('paiement_type_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->timestamps();

            $table->foreign('code_promo_type_id')->references('id')->on('promotion_type');
            $table->foreign('pays_livraison_id')->references('id')->on('pays');
            $table->foreign('pays_facturation_id')->references('id')->on('pays');
            $table->foreign('paiement_type_id')->references('id')->on('paiement_type');
            $table->foreign('client_id')->references('id')->on('clients');
        });

        Schema::create('commande_produits', function(Blueprint $table) {
            $table->increments('id');
            $table->float('prix_unitaire_ht');
            $table->integer('quantite');
            $table->integer('produit_option_id')->unsigned();
            $table->integer('taux_tva_id')->unsigned();
            $table->integer('commande_id')->unsigned();
            $table->timestamps();

            $table->foreign('produit_option_id')->references('id')->on('produit_options');
            $table->foreign('taux_tva_id')->references('id')->on('taux_tva');
            $table->foreign('commande_id')->references('id')->on('commandes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('civilites');
        Schema::drop('adresse_type');
        Schema::drop('pays');
        Schema::drop('paiement_type');
        Schema::drop('reduction_type');
        Schema::drop('promotion_type');
        Schema::drop('panier_type');
        Schema::drop('taux_tva');
        Schema::drop('categories');
        Schema::drop('ambiances');
        Schema::drop('ambiances_img');
        Schema::drop('codes_promo');
        Schema::drop('clients');
        Schema::drop('adresses');
        Schema::drop('produits');
        Schema::drop('produits_img');
        Schema::drop('produits_associes');
        Schema::drop('produit_options');
        Schema::drop('paniers');
        Schema::drop('paniers_has_produits');
        Schema::drop('reductions');
        Schema::drop('commandes');
        Schema::drop('commande_produits');
    }
}
