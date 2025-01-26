<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function showCourse(int $course_id, string $course_title){
        $courses = Course::where('status','published');
        return view('CourseDetails');
    }
}
