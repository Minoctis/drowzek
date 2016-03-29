<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ambiance;
use App\Models\Categorie;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class CatalogueController extends Controller
{
    //Accueil du cataogue
    public function dashboard() {
        $ambiances = Ambiance::orderBy('ordre', 'asc')->get();
        $categories = Categorie::with('children')->whereNull('parent_id')->orderBy('ordre', 'asc')->get();
        return view('pages.admin.catalogue.dashboard', ['ambiances' => $ambiances, 'categories' => $categories]);
    }

    //Ajout d'une ambiance
    public function addAmbiance(Request $request) {
        //validation
        $this->validate($request, [
            'nom'         => 'required|unique:ambiances',
            'slug'        => ['required', 'regex:/^[a-z][-a-z0-9]*$/', 'unique:ambiances'],
            'description' => 'required'
        ]);
        //Insertion en base
        $ambiance = new Ambiance;

        $ambiance->nom = $request->nom;
        $ambiance->slug = $request->slug;
        $ambiance->description = $request->description;
        $ambiance->ordre = Ambiance::count() + 1;

        $ambiance->save();
        //Redirection
        return redirect()->route('admin::catalogue::dashboard');
    }

    //Edition d'une ambiance
    public function editAmbiance($id, Request $request) {
        //Validation
        $this->validate($request, [
            'nom'         => 'required|unique:ambiances,nom,'.$id,
            'slug'        => ['required', 'regex:/^[a-z][-a-z0-9]*$/', 'unique:ambiances,slug,'.$id],
            'description' => 'required'
        ]);
        //Update des données
        $ambiance = Ambiance::find($id);
        $ambiance->nom = $request->nom;
        $ambiance->slug = $request->slug;
        $ambiance->description = $request->description;
        $ambiance->save();
        //Redirection
        return redirect()->route('admin::catalogue::dashboard');
    }

    public function updateOrdreAmbiances(Request $request) {
        echo 'test';
    }

    //Ajout d'une catégorie
    public function addCategorie(Request $request) {
        //Validation
        $this->validate($request, [
            'nom'  => 'required|unique:categories',
            'slug' => ['required', 'regex:/^[a-z][-a-z0-9]*$/', 'unique:categories'],
            'img'  => 'image|mimes:jpeg,png,gif|size:500'
        ]);
        //Enregistrement de l'image
        $extension = $request->file('img')->getClientOriginalExtension();
        $imageName = $request->slug . '.' . $extension;
        $request->file('img')->move( base_path() . '/public/img/categories/', $imageName);
        //Insertion en base
        $categorie = new Categorie();

        $categorie->nom = $request->nom;
        $categorie->slug = $request->slug;
        $categorie->ordre = Categorie::where(['parent_id' => null])->get()->count() + 1;
        $categorie->img_name = $imageName;

        $categorie->save();
        //Redirection
        return redirect()->route('admin::catalogue::dashboard');
    }

    //Edition d'une catégorie
    public function editCategorie(Request $request, $id) {
        //Validation
        $this->validate($request, [
            'nom'  => 'required|unique:categories,nom,'.$id,
            'slug' => ['required', 'regex:/^[a-z][-a-z0-9]*$/', 'unique:categories,slug,'.$id],
            'img'  => 'image|mimes:jpeg,png,gif|size:500'
        ]);
        //Update des données
        $categorie = Categorie::find($id);
        $categorie->nom = $request->nom;
        $categorie->slug = $request->slug;
        //Si changement de l'image
        if ($request->hasFile('img')) {
            //Enregistrement de l'image
            $extension = $request->file('img')->getClientOriginalExtension();
            $imageName = $request->slug . '.' . $extension;
            $request->file('img')->move(base_path() . '/public/img/categories/', $imageName);

            $categorie->img = $imageName;
        }
        $categorie->save();
        //Redirection
        return redirect()->route('admin::catalogue::dashboard');
    }

    public function updateOrdreCategories(Request $request) {
        $categories = $request->data;
        //update ordre des catégories
        foreach($categories as $index => $categorie) {
            $categorieToUpdate = Categorie::find($categorie['id']);
            $categorieToUpdate->ordre = $index + 1;
            $categorieToUpdate->save();

            if (isset($categorie['children'])) {
                foreach($categorie['children'] as $childIndex => $child) {
                    $sousCategorieToUpdate = Categorie::find($child['id']);
                    $sousCategorieToUpdate->ordre = $childIndex + 1;
                    $sousCategorieToUpdate->parent_id = $categorie['id'];
                    $sousCategorieToUpdate->save();
                }
            }
        }
        return $categories;
    }
}
