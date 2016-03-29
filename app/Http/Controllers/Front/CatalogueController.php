<?php

namespace App\Http\Controllers\Front;

use App\Models\Categorie;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CatalogueController extends Controller
{
    public function showCategorie($slug) {
        $model = new Categorie();
        $categorie = $model->getBySlug($slug);
        return view('pages.creations', ['categorie' => $categorie]);
    }
}
