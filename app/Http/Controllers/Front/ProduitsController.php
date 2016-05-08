<?php

namespace App\Http\Controllers\Front;

use App\Models\Ambiance;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\ProduitOption;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProduitsController extends Controller
{
    public function showIndex() {
        $new_produits = Produit::where('is_new', 1)
                                ->with('images')
                                ->get();

        $top_ambiances = Ambiance::orderBy('ordre', 'asc')
                                    ->take(3)
                                    ->with('images')
                                    ->get();

        $data = [
            'new_produits' => $new_produits,
            'top_ambiances' => $top_ambiances
        ];
        return view('pages.front', $data);
    }

    public function showProduit($slug) {
        $produit = Produit::where('slug', $slug)->first();
        $options = ProduitOption::where('produit_id', $produit->id)->with('tauxTva')->orderBy('ordre')->get();
        $categorie = Categorie::find($produit->categorie_id);
        return view('pages.produit', ['produit' => $produit, 'options' => $options, 'categorie' => $categorie]);
    }
}
