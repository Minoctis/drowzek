<?php

namespace App\Http\Controllers\Admin;

use App\Models\Theme;

use Debugbar;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ThemeController extends Controller
{
    public function showThemeList() {
        $slides = Theme::where('type', 'slider')->get();
        $opportunites = Theme::where('type', 'opportunite')->get();


        $data = [
            'slides' => $slides,
            'opportunites' => $opportunites
        ];

        return view('pages.admin.theme.liste', $data);
    }

    public function updateSlide($id, Request $request) {
        //die(var_dump($request->all()));
        //Validation
        $this->validate($request, [
            'titre' => 'required',
            'lien'      => 'required',
        ]);

        //Update des données
        $slide = Theme::find($id);
        $slide->titre = $request->titre;
        $slide->lien = $request->lien;

        $slide->save();

        return redirect()->route('admin::theme::liste');

    }


}
