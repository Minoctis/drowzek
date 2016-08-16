<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ambiance;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\ProduitOption;
use Debugbar;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;

class ProduitsController extends Controller
{
    public function listeProduits() {
        $produits = Produit::with('categorie.parent')->with('ambiances')->get();
        return view('pages.admin.produits.liste', ['produits' => $produits]);
    }

    public function getAjouterProduit() {
        return view('pages.admin.produits.ajouter');
    }

    public function postAjouterProduit() {
        return view('pages.admin.produits.ajouter');
    }

    public function getModifierProduit($produit_id) {
        $categories = Categorie::all();
        $produit = Produit::where('id', $produit_id)
            ->with('options')
            ->first();

        return view('pages.admin.produits.modifier', ['produit' => $produit], ['categorie' => $categories]);
    }

    public function deleteProduit($id) {
        $produit = Produit::find($id);

        $produit->delete();

        if ($produit->trashed()) return Response::json([], 204);
        else return Response::json([], 404);
    }
}
