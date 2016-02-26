<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandeStatutUpdateCommandes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_statut', function(Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
        });

        if (Schema::hasTable('commande_produits')) {
            Schema::table('commande_produits', function($table) {
                $table->dropForeign(['produit_option_id']);
                $table->dropColumn('produit_option_id');

                $table->string('produit_libelle');
                $table->string('option_libelle');
            });
        }

        if (Schema::hasTable('commandes')) {
            Schema::table('commandes', function($table) {
                $table->integer('commande_statut_id')->unsigned();
                $table->foreign('commande_statut_id')->references('id')->on('commande_statut');
            });
        };
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('commande_statut');
        Schema::dropIfExists('commande_produits');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
