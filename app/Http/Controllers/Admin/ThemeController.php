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


}
