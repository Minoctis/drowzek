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

    public function showAmbiance($slug) {
        $model = new Ambiance();
        $ambiance = $model->where('slug', $slug)->with('produits')->first();
//        foreach($ambiance->produits as $produit) {
//            $options = ProduitOption::where('produit_id', $produit->id)->with('tauxTVA')->get();
//            $ambiance->produits->options = $options;
//        }
//        die($ambiance);
        return view('pages.fiche-ambiance', ['ambiance' => $ambiance]);
    }
}
