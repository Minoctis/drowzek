<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ambiance;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\ProduitImage;
use App\Models\ProduitOption;
use DB;
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
        
        $produits = Produit::withTrashed()->with('categorie.parent')->with('ambiances')->get();
        
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
        $produits = Produit::with('ambiances')->with('categorie.parent');

        if ($request->has('nom') && !empty($request->nom)) {
            $produits->where('nom', 'like', $request->nom.'%');
        }

        if ($request->has('nouveau') && isset($request->nouveau)) {
            $produits->where('is_new', $request->nouveau);
        }

        if ($request->has('categorie') && !empty($request->categorie)) {
            $produits->whereHas('categorie', function ($query) use ($request) {
                $query->where(function ($subQuery) use ($request) {
                    $subQuery->where('id', $request->categorie)->orWhere('parent_id', $request->categorie);
                });
            });
        }
        
        $produits = $produits->get();

        return Response::json($produits, 200);
    }
}
