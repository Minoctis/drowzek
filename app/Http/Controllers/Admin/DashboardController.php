<?php

namespace App\Http\Controllers\Admin;


use App\Models\Avis;
use App\Models\Commande;
use App\Models\Produit;
use Debugbar;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function showDashboard() {

        $commandes_jour = Commande::where('date', '>=', date('Y-m-d'))->get();
        $produits_jour = Produit::get();
        $avis_jour = Avis::where('created_at', '>=', date('Y-m-d'))->get();
        $date_jour = date('d/m/Y');


        $data = [
            'commandes_jour'    => $commandes_jour,
            'produits_jour'     => $produits_jour,
            'avis_jour'         => $avis_jour,
            'date_jour'         => $date_jour
        ];

        return view('pages.admin.dashboard', $data);
    }

}
