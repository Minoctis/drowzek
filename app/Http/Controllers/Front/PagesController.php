<?php

namespace App\Http\Controllers\Front;

use App\Models\Pages;

use Debugbar;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{


    public function showPage($slug) {
        $page = Pages::where('slug', $slug)->first();


        return view('pages.page-static', ['page' => $page] );
    }
}
