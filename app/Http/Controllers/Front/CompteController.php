<?php

namespace App\Http\Controllers\Front;

use App\Models\Adresse;
use App\Models\Client;
use App\Models\Commande;
use App\Models\CommandeProduit;
use App\Models\CommandeStatut;
use Auth;
use Debugbar;
use Hash;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class CompteController extends Controller
{
    public function updateCompteClient(Request $request) {
        $client = Client::find(Auth::user()->id);

        $validator = Validator::make($request->all(), [
            'civilite' => 'required|in:1,2',
            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'required|email|max:255|unique:clients,email,'.$client->id,
            'date-naissance' => 'date_format:Y-m-d',
            'new-password' => 'confirmed|min:6',
            'password' => 'required'
        ]);

        $validator->after(function($validator) use($request, $client) {
            if (!Hash::check($request->input('password'), $client->password)) {
                $validator->errors()->add('actual_password', 'Le mot de passe saisit ne correspond pas au mot de passe du compte.');
            }
        });

        if ($validator->fails()) {
            return redirect('/compte/accueil#infos')
                ->withErrors($validator)
                ->withInput();
        }
        else {
            $client->civilite_id = $request->input('civilite');
            $client->prenom = $request->input('prenom');
            $client->nom = $request->input('nom');
            $client->email = $request->input('email');
            $client->date_naissance = $request->has('date-naissance') ? $request->input('date-naissance') : null;
            $client->password = $request->has('new-password') ? bcrypt($request->input('new-password')) : Auth::user()->password;

            $client->save();

            return redirect('/compte/accueil#infos');
        }
    }

    public function showCompteClient() {

        $commandes_recentes = Commande::where('client_id', Auth::user()->id)
                                        ->with('statut')
                                        ->orderBy('date', 'desc')
                                        ->take(3)
                                        ->get();

        $commandes = Commande::where('client_id', Auth::user()->id)
            ->with('statut')
            ->orderBy('date', 'desc')
            ->get();

        $adresses = Adresse::where('client_id', Auth::user()->id)->with('pays')->get();

        $data = [
            'commandes_recentes' => $commandes_recentes,
            'commandes'          => $commandes,
            'adresses'           => $adresses
        ];

        return view('pages.compte.accueil', $data);
    }

    public function detailCommande($reference) {
        $commande = Commande::where('reference', $reference)
            ->with('statut')
            ->with('paiementType')
            ->with('paysLivraison')
            ->with('paysFacturation')
            ->first();

        if ($commande->client_id !== Auth::user()->id) {
            return redirect('/compte/accueil');
        }

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
            'detail_commande'    => $commande,
            'commande_produits'  => $commande_produits,
            'commande_total_HT'  => $commande_total_HT,
            'commande_total_TTC' => $commande_total_TTC
        ];

        return view('pages.compte.detail-commande', $data);
    }

    public function deleteAdresse($id) {
        $adresse = Avis::find($id);

        $adresse->delete();

        if ($adresse->trashed()) return Response::json([], 204);
        else return Response::json([], 404);
    }
}
