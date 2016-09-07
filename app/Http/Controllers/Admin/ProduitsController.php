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
        $categories = Categorie::with('children')->get();
        $produit = Produit::where('id', $produit_id)
            ->withTrashed()
            ->with('options')
            ->with('categorie')
            ->with('images')
            ->first();

        return view('pages.admin.produits.modifier', ['produit' => $produit], ['categorie' => $categories]);
    }

    public function postModifierProduit($id, Request $request) {
        //Validation
        $this->validate($request, [
            'nom'  => 'required|unique:produits,nom,'.$id,
            'slug' => ['required', 'regex:/^[a-z][-a-z0-9]*$/', 'unique:produits,slug,'.$id],
            'dimension' => 'required',
            'description' => 'required',
            'categorie' => 'required',
            'isNew' => 'required'
        ]);
        //Update des données
        $produit = Produit::withTrashed()->find($id);
        $produit->nom = $request->nom;
        $produit->slug = $request->slug;
        $produit->dimensions = $request->dimension;
        $produit->description = $request->description;
        $produit->categorie_id = $request->categorie;
        $produit->is_new = $request->isNew;
        //Si changement de l'image

        $produit->save();
        //Redirection
        return redirect()->route('admin::produits::edit', $id);
    }

    public function deleteProduit($id) {
        $produit = Produit::find($id);

        $produit->delete();

        if ($produit->trashed()) return Response::json([], 204);
        else return Response::json([], 404);
    }

    public function restoreProduit($id) {
        $produit = Produit::withTrashed()->where('id', $id)->first();

        $produit->restore();

        if (!$produit->trashed()) return Response::json([], 204);
        else return Response::json([], 500);
    }

    public function rechercheProduit(Request $request) {
        $produits = Produit::withTrashed()->with('ambiances')->with('categorie.parent');

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
