<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Auth;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function showCourse(int $course_id, string $course_title){
        $user = Auth::user();
        $is_enrolled = false;
        if($user){
            $is_enrolled = $user->enrollments->contains($course_id);
        }
       
        $course = Course::with('sections.videos')->findOrFail($course_id);
        // var_dump($course);
        // dd(json_encode($course, JSON_PRETTY_PRINT));
        // dd($course);
        return view('CourseDetails',["course"=>$course,"is_enrolled"=>$is_enrolled]);
    }
}
