<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Video;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(){
        $user = Auth::user();
        dd(json_encode($user->enrollments, JSON_PRETTY_PRINT));
        return view('profile',['user'=>$user]);
    }
    public function profile_course(int $course_id){
        $user = Auth::user();
        if($user->enrollments->contains($course_id)){
            $course = Course::where("id" , $course_id)->first();
        }
        else{
            return redirect("/");
        }
        
        return view('profile_course',['user'=>$user,"course"=>$course]);
    }
    public function profile_course_video(int $course_id, int $section_id, int $video_id)
    {
        $user = Auth::user();
    
        // Check if the user is enrolled in the course
        if (!$user->enrollments->contains('id', $course_id)) {
            return redirect("/")->with('error', 'You are not enrolled in this course.');
        }
    
        // Fetch the course with sections and videos using eager loading
        $course = Course::with(['sections.videos'])
            ->where('id', $course_id)
            ->first();
    
        // Validate if the course, section, and video exist
        if (!$course) {
            return redirect("/")->with('error', 'Course not found.');
        }
    
        $section = $course->sections->where('id', $section_id)->first();
        if (!$section) {
            return redirect("/")->with('error', 'Section not found.');
        }
    
        $video = $section->videos->where('id', $video_id)->first();
        if (!$video) {
            return redirect("/")->with('error', 'Video not found.');
        }
    
        // Return the profile view with the user, course, and video
        return view('video', [
            'user' => $user,
            'course' => $course,
            'video' => $video,
        ]);
    }
}
