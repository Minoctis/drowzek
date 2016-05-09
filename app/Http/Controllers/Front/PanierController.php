<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PanierController extends Controller
{
    public function showPanier() {
        return view('pages.panier');
    }

    public function addProductToPanier(Request $request) {

    }
}
