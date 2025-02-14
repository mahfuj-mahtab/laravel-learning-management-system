<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $courses = Course::where('status','ACTIVE')->get();
        // dd($courses);
        return view('index',['courses' => $courses]);
    }
}
