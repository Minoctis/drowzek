<?php

namespace App\Http\Controllers\Front;

use App\Models\Categorie;
use App\Models\Produit;
use App\Models\ProduitOption;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProduitsController extends Controller
{
    public function showIndex() {
        return view('pages.front');
    }

    public function showProduit($slug) {
        $produit = Produit::where('slug', $slug)->first();
        $options = ProduitOption::where('produit_id', $produit->id)->with('tauxTva')->orderBy('ordre')->get();
        $categorie = Categorie::find($produit->categorie_id);
        return view('pages.produit', ['produit' => $produit, 'options' => $options, 'categorie' => $categorie]);
    }
}
