<?php

namespace App\Http\Controllers\Admin;

use App\Models\Avis;
use App\Models\Produit;
use Debugbar;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AvisController extends Controller
{
    public function showAvisList() {
        $avis = Avis::with('produit')->get();
        return view('pages.admin.avis.liste', ['avis' => $avis]);
    }

    public function deleteAvis($id) {
        $avis = Avis::find($id);

        $avis->delete();

        if ($avis->trashed()) return Response::json([], 204);
        else return Response::json([], 404);
    }
}
