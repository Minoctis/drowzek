<?php

namespace App\Http\Controllers\Admin;

use App\Models\Commande;
use App\Models\CommandeProduit;
use App\Models\CommandeStatut;
use App\Models\Client;
use App\Models\Civilite;
use App\Models\Pays;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommandesController extends Controller
{
    //

    public function showCommandesList(){
        $commandes = Commande::with('statut')->get();
        $commande_statuts = CommandeStatut::all();
        return view('pages.admin.commandes.liste', ['commandes' => $commandes], ['commande_statuts' => $commande_statuts]);
    }

    public function showCommande($commande_ref){

        $commande = Commande::where('reference', $commande_ref)
            ->with('statut')
            ->with('paiementType')
            ->with('paysLivraison')
            ->with('paysFacturation')
            ->with('client')
            ->first();

        $commande_produits = CommandeProduit::where('commande_id', $commande->id)
            ->with('taux_tva')
            ->get();
        $commande_total_HT = 0;
        $commande_total_TTC = 0;

        foreach($commande_produits as $produit) {
            $commande_total_HT += $produit->prix_unitaire_ht * $produit->quantite;
            $commande_total_TTC += $produit->prix_unitaire_ht * $produit->quantite + ($produit->taux_tva->valeur / 100 * $produit->prix_unitaire_ht * $produit->quantite);
        }

        $data = [
            'commande'    => $commande,
            'commande_produits'  => $commande_produits,
            'commande_total_HT'  => $commande_total_HT,
            'commande_total_TTC' => $commande_total_TTC,
        ];

        return view('pages.admin.commandes.edit', ['commande' => $commande], $data);
    }
}