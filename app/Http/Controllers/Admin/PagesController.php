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


}
