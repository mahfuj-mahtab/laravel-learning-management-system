<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function Index(){
        return view('AdminDashboard');
    }
}
