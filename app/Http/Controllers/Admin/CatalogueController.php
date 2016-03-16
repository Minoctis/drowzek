<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ambiance;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class CatalogueController extends Controller
{
    public function dashboard() {
        $ambiances = Ambiance::orderBy('ordre', 'asc')->get();
        return view('pages.admin.catalogue.dashboard', ['ambiances' => $ambiances]);
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

    public function editAmbiance($id) {
        $ambiance = Ambiance::find($id);

        return view('pages.admin.catalogue.ambiances.edit', ['ambiance' => $ambiance]);
    }
}
