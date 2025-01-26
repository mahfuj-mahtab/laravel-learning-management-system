<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function showCourse(int $course_id, string $course_title){
        $course = Course::with('sections.videos')->findOrFail($course_id);
        // var_dump($course);
        dd(json_encode($course, JSON_PRETTY_PRINT));
        dd($course);
        return view('CourseDetails',["course"=>$course]);
    }
}
