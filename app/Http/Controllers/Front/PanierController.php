<?php

namespace App\Http\Controllers\Front;

use App\Models\Client;
use App\Models\CommandeProduit;
use App\Models\Commande;
use App\Models\Panier;
use App\Models\PaniersHasProduits;
use App\Models\Pays;
use App\Models\ProduitOption;
use Auth;
use Debugbar;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

class PanierController extends Controller
{
    public function showPanier(Request $request) {
        $data = $this->getPanierData($request);
        
        return view('pages.panier', $data);
    }

    public function ckeckIfPanierExists(Request $request) {
        //Récupère le panier actif de l'utilisateur s'il est connecté
        $panier_actif = Auth::check() ? Panier::where('client_id', Auth::user()->id)->where('panier_type_id', 1)->with(['produits' => function($query) { $query->select('produit_option_id'); }])->first() : null;
        //Pas de panier en session
        if(!$request->session()->has('panier')) {
            $panier = [
                'id' => null,
                'client_id' => null,
                'date_creation' => date('Y-m-d H:i:s'),
                'date_modification' => date('Y-m-d H:i:s'),
                'produits_option' => []
            ];

            //Ajout des données du panier actif de l'utilisateur s'il existe
            if($panier_actif && $panier_actif->count() !== 0) {
                $panier['id'] = $panier_actif->id;
                $panier['client_id'] = Auth::user()->id;
                $panier['produits_option'] = $panier_actif->produits->toArray();
            }
            //Ajoute le panier en session
            $request->session()->put('panier', $panier);
        }
    }

    public function addProductToPanier(Request $request) {
        //Check du panier en session
        $this->ckeckIfPanierExists($request);
        //Récupère l'option de produit cliqué
        $produit_option = $request->input('option_id');

        //Récupère le panier actif de l'utilisateur
        $panier_actif = Auth::check() ? Panier::where('client_id', Auth::user()->id)->where('panier_type_id', 1)->with('produits')->first() : null;
        //Si l'utilisateur connecté n'a pas de panier actif
        if(Auth::check() && !$panier_actif) {
            //Création d'un panier actif
            $panier_actif = Panier::create([
                'client_id' => Auth::user()->id,
                'panier_type_id' => 1
            ]);
        }
        //Si l'utilisateur est connecté on insert en base les données du produit ajouté
        if($panier_actif) {
            PaniersHasProduits::create([
                'panier_id' => $panier_actif->id,
                'produit_option_id' => $produit_option
            ]);

            Session::put('panier.id', $panier_actif->id);
        }
        //Ajoute l'option en session
        Session::push('panier.produits_option', ['produit_option_id' => intval($produit_option)]);
        Session::put('panier.date_modification', date('Y-m-d H:i:s'));
        return json_encode(['test' => $produit_option]);
    }

    public function editPanier(Request $request) {
        if ($request->has('delete')) {
            foreach(Session::get('panier.produits_option') as $index => $option) {
                $session = Session::get('panier.produits_option');
                if ($session[$index]['produit_option_id'] == $request->get('delete')) {
                    Session::forget('panier.produits_option.'.$index);
                }
            }
            return json_encode(['noError' => true]);
        }
        else return json_encode(['noError' => false]);
    }

    public function showAdresses(Request $request) {
        $data = $this->getPanierData($request);
        $data['client'] = Client::find(Auth::user()->id);
        return view('pages.checkout.adresses', $data);
    }

    public function showLivraison(Request $request) {
        $data = $this->getPanierData($request);
        
        return view('pages.checkout.livraison', $data);
    }

    public function showPaiement(Request $request) {
        $data = $this->getPanierData($request);
        
        return view('pages.checkout.paiement', $data);
    }

    public function showConfirmation(Request $request) {
        $data = $this->getPanierData($request);
        $client = Client::find(Auth::user()->id);
        $pays = Pays::find(1);
        $commande = new Commande();
            $commande->reference = "RVJS15VG";
            $commande->date = date('Y-m-d H:i:s');
            $commande->adresse_facturation = '100 rue nationale';
            $commande->compl_adresse_facturation = 'Appartement 3';
            $commande->cp_facturation = '59000';
            $commande->ville_facturation = 'Lille';
            $commande->telephone_facturation = '0123456789';
            $commande->prenom_livraison = $client->prenom;
            $commande->nom_livraison = $client->nom;
            $commande->adresse_livraison = '100 rue nationale';
            $commande->pays_livraison_id = $pays->id;
            $commande->pays_facturation_id = $pays->id;
            $commande->compl_adresse_livraison = 'Appartement 3';
            $commande->paiement_type_id = 1;
            $commande->client_id = Auth::user()->id;
            $commande->cp_livraison = '59000';
            $commande->ville_livraison = 'Lille';
            $commande->telephone_livraison = '0123456789';
            $commande->commande_statut_id = 2;
            $commande->frais_de_port = 17;

        $commande->save();

        foreach($data['produits'] as $produit) {
            $commande_produit = new CommandeProduit;
            
                $commande_produit->taux_tva_id  = $produit->taux_tva_id;
                $commande_produit->commande_id  = $commande->id;
                $commande_produit->prix_unitaire_ht  = $produit->prix_ht;
                $commande_produit->quantite  = $data['quantites'][$produit->id];
                $commande_produit->produit_libelle  = $produit->produit->nom;
                $commande_produit->option_libelle = $produit->libelle;

            $commande_produit->save();
        }

        $panier = Panier::where('client_id', Auth::user()->id)->where('panier_type_id', 1)->first();

        PaniersHasProduits::where('panier_id', $panier->id)->delete();
        Panier::destroy($panier->id);

        Session::forget('panier');
        return view('pages.checkout.confirmation', $data);
    }
    
    private function getPanierData(Request $request) {
        $options_id = $request->session()->has('panier.produits_option') ? array_map(function($produit){return $produit['produit_option_id'];}, $request->session()->get('panier.produits_option')) : '';
        $quantites = !empty($options_id) ? array_count_values($options_id) : [];

        $produits = ProduitOption::whereIn('id', $options_id)->with('produit.images')->with('produit.categorie')->with('tauxTva')->get();

        $total_ht = 0;
        $total_tva = 0;

        foreach($produits as $produit) {
            $total_ht += $produit->prix_ht * $quantites[$produit->id];
            $total_tva += $produit->prix_ht * $produit->tauxTva->valeur / 100 * $quantites[$produit->id];
        }

        $data = [
            'produits' => $produits,
            'quantites' => $quantites,
            'total_ht' => $total_ht,
            'total_tva' => $total_tva
        ];
        
        return $data;
    }
}
