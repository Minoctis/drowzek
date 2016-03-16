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
    public function dashboard() {
        $ambiances = Ambiance::orderBy('ordre', 'asc')->get();
        $categories = Categorie::with('children')->whereNull('parent_id')->orderBy('ordre', 'asc')->get();
        return view('pages.admin.catalogue.dashboard', ['ambiances' => $ambiances, 'categories' => $categories]);
    }

    public function addAmbiance(Request $request) {
        $this->validate($request, [
            'nom' => 'required|unique:ambiances',
            'slug' => ['required', 'regex:/^[a-z][-a-z0-9]*$/', 'unique:ambiances'],
            'description' => 'required'
        ]);

        $ambiance = new Ambiance;

        $ambiance->nom = $request->nom;
        $ambiance->slug = $request->slug;
        $ambiance->description = $request->description;
        $ambiance->ordre = Ambiance::count() + 1;

        $ambiance->save();

        return redirect()->route('admin::catalogue::dashboard');
    }

    public function afficheEditAmbiance($id) {
        $ambiance = Ambiance::find($id);

        return view('pages.admin.catalogue.ambiances.edit', ['ambiance' => $ambiance]);
    }

    public function editAmbiance($id, Request $request) {
        $this->validate($request, [
            'nom' => 'required|unique:ambiances,nom,'.$id,
            'slug' => ['required', 'regex:/^[a-z][-a-z0-9]*$/', 'unique:ambiances,slug,'.$id],
            'description' => 'required'
        ]);

        $ambiance = Ambiance::find($id);
        $ambiance->nom = $request->nom;
        $ambiance->slug = $request->slug;
        $ambiance->description = $request->description;
        $ambiance->save();

        return redirect()->route('admin::catalogue::dashboard');
    }
}
