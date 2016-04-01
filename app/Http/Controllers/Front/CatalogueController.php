<?php

namespace App\Http\Controllers\Front;

use App\Models\Ambiance;
use App\Models\Categorie;
use App\Models\ProduitOption;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CatalogueController extends Controller
{
    public function showCategorie($slug) {
        $model = new Categorie();
        $categorie = $model->getBySlug($slug);
        return view('pages.creations', ['categorie' => $categorie]);
    }

    public function showListeAmbiances() {
        $model = new Ambiance();
        $ambiances = $model->getAllAmbiances();
        ini_set('xdebug.var_display_max_depth', 10);
//        die(var_dump($ambiances));

        return view('pages.ambiance', ['ambiances' => $ambiances]);
    }

    public function showAmbiance($slug) {
        $model = new Ambiance();
        $ambiance = $model->getBySlug($slug);
        return view('pages.fiche-ambiance', ['ambiance' => $ambiance]);
    }
}
