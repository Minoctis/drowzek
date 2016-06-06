<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Commande;
use App\Models\CommandeStatut;
use App\Models\CommandeProduit;
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
}
