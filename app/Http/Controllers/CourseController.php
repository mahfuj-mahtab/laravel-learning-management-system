<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function showCourse(int $course_id, string $course_title){
        return view('CourseDetails');
    }
}
