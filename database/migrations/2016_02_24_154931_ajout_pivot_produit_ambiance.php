<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AjoutPivotProduitAmbiance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasColumn('produits','ambiance_id')) {
            Schema::table('produits', function ($table) {
                $table->dropForeign(['ambiance_id']);
               $table->dropColumn('ambiance_id');
            });
        }

        Schema::create('ambiances_has_produits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produit_id')->unsigned();
            $table->integer('ambiance_id')->unsigned();

            $table->foreign('produit_id')->references('id')->on('produits');
            $table->foreign('ambiance_id')->references('id')->on('ambiances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('ambiances_has_produits');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
