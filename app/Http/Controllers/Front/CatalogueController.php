<?php

namespace App\Http\Controllers\Front;

use App\Models\Ambiance;
use App\Models\Categorie;
use App\Models\ProduitOption;
use Debugbar;
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
        $ambiances = Ambiance::with('images')->orderBy('ordre', 'asc')->get();

        return view('pages.ambiance', ['ambiances' => $ambiances]);
    }

    public function showAmbiance($slug) {
        $ambiance = Ambiance::where('slug', $slug)
                            ->with('images')
                            ->with('produits.options.tauxTva')
                            ->first();

        Debugbar::info();
        return view('pages.fiche-ambiance', ['ambiance' => $ambiance]);
    }
}
