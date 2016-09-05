<?php

namespace App\Http\Controllers\Admin;


use Debugbar;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Dashboardontroller extends Controller
{
    public function showDashboard() {

        return view('pages.admin.dashboard');
    }

}
