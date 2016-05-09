<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ambiance;
use App\Models\Produit;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProduitsController extends Controller
{
    public function listeProduits() {
        $produits = Produit::all();
        foreach ($produits as $produit) {
            $categorie = $produit->categorie();
            dump($categorie);
        }
        return view('pages.admin.produits.liste', ['produits' => $produits]);
    }
}
