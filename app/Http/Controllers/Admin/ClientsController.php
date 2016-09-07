<?php

namespace App\Http\Controllers\Admin;

use App\Models\Adresse;
use App\Models\Client;
use App\Models\Commande;
use App\Models\CommandeStatut;
use App\Models\CommandeProduit;
use App\Models\Pays;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{
    //

    public function showClientList(){
        $clients = Client::with('civilite')->get();

        return view('pages.admin.clients.liste', ['clients' => $clients]);
    }

    public function showClient($client_id){
        $client = Client::where('id',$client_id)->with('civilite')->with('adresses')->first();
        $adresses = Adresse::where('client_id', $client_id)->with('pays')->get();
        $pays = Pays::all();
        $commandes = Commande::where('client_id', $client_id)->with('statut')->get();
        $data = [
            'client' => $client,
            'pays' => $pays,
            'adresses' => $adresses,
            'commandes' => $commandes
        ];

        return view('pages.admin.clients.edit', $data);
    }

    public function updateClient($id, Request $request) {
//        die(var_dump($request->all()));
        //Validation
        $this->validate($request, [
            'civilite' => 'required|numeric',
            'prenom'      => 'required',
            'nom'         => 'required',
            'email'       => 'required|email|unique:clients,email,'.$id,
            'date_naissance' => 'date',
        ]);
        //Update des données
        $client = Client::find($id);
        $client->civilite_id = $request->civilite;
        $client->prenom = $request->prenom;
        $client->nom = $request->nom;
        $client->email = $request->email;
        $client->date_naissance = empty($request->naissance) ? null : Carbon::createFromFormat('d/m/Y', $request->naissance);

        $client->save();

        return redirect()->route('admin::clients::liste');

    }

    public function updateClientAdresse($id, Request $request) {
        //die(var_dump($request->all()));
        //Validation
        $this->validate($request, [
            'id'                  => 'required',
            'societe'             => '',
            'nom_adresse'         => 'required',
            'adresse'             => 'required',
            'compl_adresse'        => '',
            'cp'                  => 'required',
            'ville'               => 'required',
            'nom_livraison'                 => 'required',
            'prenom_livraison'              => 'required',
            'tel'                 => 'required',
            'pays'                => 'required'
        ]);

        //Update des données
        $adresse = Adresse::find($id);

        $adresse->nom_carnet_adresse = $request->nom_adresse;
        $adresse->adresse            = $request->adresse;
        $adresse->compl_adresse      = $request->compl_adresse;
        $adresse->societe            = $request->societe;
        $adresse->cp                 = $request->cp;
        $adresse->ville              = $request->ville;
        $adresse->nom_livraison      = $request->nom_livraison;
        $adresse->prenom_livraison   = $request->prenom_livraison;
        $adresse->telephone          = $request->tel;
        $adresse->pays_id            = $request->pays;

        $adresse->save();

        return redirect()->route('admin::clients::liste');

    }
}
