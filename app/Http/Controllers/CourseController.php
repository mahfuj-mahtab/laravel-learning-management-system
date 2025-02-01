<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
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
        // var_dump($course->instructor->name);
        // dd(json_encode($course, JSON_PRETTY_PRINT));
        // dd($course);
        return view('CourseDetails',["course"=>$course,"is_enrolled"=>$is_enrolled]);
    }

    public function profile_course_enroll(int $course_id){
        print_r('hit');
        $user = Auth::user();
        $course = Enrollment::where("course_id", $course_id)->where("user_id" , $user->id)->first();
        if($course){
            return redirect('/profile');
        }
        else{
            $enroll = Enrollment::create(['user_id'=>$user->id, "course_id"=> $course_id, "enrolled_at"=> now()]);
            return redirect("/profile");

        }
    }
    
    
}
