<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ambiance;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\ProduitImage;
use App\Models\ProduitOption;
use Debugbar;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;

class ProduitsController extends Controller
{
    public function listeProduits() {
        $ambiances = Ambiance::all();
        $categories = Categorie::all();
        
        $produits = Produit::with('categorie.parent')->with('ambiances')->get();
        
        $data = [
            'produits' => $produits,
            'ambiances' => $ambiances,
            'categories' => $categories
        ];
        
        return view('pages.admin.produits.liste', $data);
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
            ->with('categorie')
            ->with('images')
            ->first();

        return view('pages.admin.produits.modifier', ['produit' => $produit], ['categorie' => $categories]);
    }

    public function deleteProduit($id) {
        $produit = Produit::find($id);

        $produit->delete();

        if ($produit->trashed()) return Response::json([], 204);
        else return Response::json([], 404);
    }

    public function rechercheProduit(Request $request) {
        $produits = Produit::orderBy('nom', 'asc');

        if ($request->has('nom') && !empty($request->nom)) {
            $produits->where('nom', 'like', $request->nom.'%');
        }

        if ($request->has('nouveau') && !empty($request->nouveau)) {
            $produits->where('is_new', $request->nouveau);
        }

        if ($request->has('categorie') && !empty($request->categorie)) {
            $produits->where('categorie_id', $request->categorie);
        }
        
        $produits = $produits->get();
        
        return Response::json($produits, 200);
    }
}
