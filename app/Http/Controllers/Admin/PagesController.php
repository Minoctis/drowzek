<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pages;

use Debugbar;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function showListPages() {
        $pages = Pages::orderBy('ordre', 'asc')->get();


        $data = [
            'pages' => $pages
        ];

        return view('pages.admin.pages.liste', $data);
    }

    public function showPage($id){
        $page = Pages::where('id', $id)->first();

        return view('pages.admin.pages.edit', ['page' => $page]);
    }

    public function updatePage($id, Request $request) {
//        die(var_dump($request->all()));
        //Validation
        $this->validate($request, [
            'titre' => 'required',
            'desc'      => 'required'
        ]);

        //Update des données
        $page = Pages::find($id);
        $page->titre = $request->titre;
        $page->description = $request->desc;

        $page->save();


        return redirect()->route('admin::pages::liste');

    }


}
