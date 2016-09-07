<?php

namespace App\Http\Controllers\Admin;

use App\Models\Commande;
use App\Models\CommandeProduit;
use App\Models\CommandeStatut;
use App\Models\Client;
use App\Models\Civilite;
use App\Models\Pays;
use App\Models\Produit;
use App\Models\ProduitOption;
use Debugbar;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;

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
            $produits = Produit::where('nom', $produit->produit_libelle)->with('options')->get();
            $commande_total_HT += $produit->prix_unitaire_ht * $produit->quantite;
            $commande_total_TTC += $produit->prix_unitaire_ht * $produit->quantite + ($produit->taux_tva->valeur / 100 * $produit->prix_unitaire_ht * $produit->quantite);
        }

        foreach($produits as $commande_produit){
            $options = $commande_produit->options;
        }

        $data = [
            'commande'    => $commande,
            'commande_produits'  => $commande_produits,
            'commande_total_HT'  => $commande_total_HT,
            'commande_total_TTC' => $commande_total_TTC,
            'produits'           => $produits
        ];

        return view('pages.admin.commandes.edit', ['commande' => $commande], $data);
    }

    public function updateProductCommande($commande_produit_libelle, Request $request){
        //die(var_dump($request->all()));
        //Validation
        $this->validate($request, [
            'qt'         => 'required',
            'option'     => 'required'
        ]);

        //Update des données
        $commande_produit = CommandeProduit::where('produit_libelle', $commande_produit_libelle);

        $commande_produit->quantite         = $request->qt;
        $commande_produit->option_libelle   = $request->option;

        $adresse->save();

        return redirect()->route('admin::commandes::edit');
    }

    public function updateStatut($id, Request $request) {
        $commande = Commande::find($id);

        $commande->commande_statut_id = $request->statut_id;

        $commande->save();

        return Response::json([], 200);
    }
}