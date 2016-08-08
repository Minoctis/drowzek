<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ambiance;
use App\Models\Produit;
use Debugbar;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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

    public function getModifierProduit() {
        return view('pages.admin.produits.modifier');
    }

    public function deleteProduit($id) {
        $produit = Produit::find($id);

        $produit->delete();

        if ($produit->trashed()) return true;
        else return false;
    }
}
