<?php

namespace App\Http\Controllers\Front;

use App\Models\Ambiance;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\ProduitOption;
use App\Models\Avis;
use Debugbar;
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
        $produit = Produit::where('slug', $slug)->with('images')->with('categorie')->with('avis')->first();
        $produit_cat = Produit::where('slug', $slug)->pluck('categorie_id')->first();
        $options = ProduitOption::where('produit_id', $produit->id)->with('tauxTva')->orderBy('ordre')->get();
        $avis = Avis::where('produit_id', $produit->id)->where('is_active', 1)->get();
        $new_produits = Produit::where('is_new', 1)
            ->with('images')
            ->where('slug','!=',$slug)
            ->get();
        $related_produits = Produit::where('categorie_id', $produit_cat)->where('slug','!=',$slug)->take(4)->with('categorie')->get();

        return view('pages.produit', ['produit' => $produit, 'options' => $options, 'new_produits' => $new_produits, 'related_produits' => $related_produits], ['avis' => $avis] );
    }
}
