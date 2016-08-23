<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Commande;
use App\Models\CommandeStatut;
use App\Models\CommandeProduit;
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
        $commandes = Commande::where('client_id', $client_id)->with('statut')->get();

        return view('pages.admin.clients.edit', ['client' => $client], ['commandes' => $commandes]);
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
}
