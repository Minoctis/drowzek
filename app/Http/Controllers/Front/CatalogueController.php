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
        $total_produits = $categorie->produits->count();
        if ($categorie->children->count() !== 0) {
            $total_produits = 0;
            foreach($categorie->children as $categorie_enfant) {
                $total_produits += $categorie_enfant->produits->count();
            }
        }
        $rand_newsletter = rand(0,$total_produits - 1);
        return view('pages.creations', ['categorie' => $categorie, "rand_newsletter" => $rand_newsletter]);
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

        $rand_newsletter = rand(0,$ambiance->produits->count() - 1);

        $data = [
            'ambiance' => $ambiance,
            'prev_ambiance' => $prev_ambiance,
            'next_ambiance' => $next_ambiance,
            'rand_newsletter' => $rand_newsletter
        ];
        Debugbar::info($rand_newsletter);
        return view('pages.fiche-ambiance', $data);
    }
}
