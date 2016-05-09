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
        $categorie = Categorie::where('slug', $slug)->with('parent')->with('children.produits')->with('produits')->first();
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
        $prev_ambiance = Ambiance::where('slug', '<', $slug)->orderBy('ordre', 'asc')->first();
        $next_ambiance = Ambiance::where('slug', '>', $slug)->orderBy('ordre', 'asc')->first();
Debugbar::info($prev_ambiance);
Debugbar::info($next_ambiance);
        $data = [
            'ambiance' => $ambiance,
            'prev_ambiance' => $prev_ambiance,
            'next_ambiance' => $next_ambiance
        ];
        return view('pages.fiche-ambiance', $data);
    }
}
