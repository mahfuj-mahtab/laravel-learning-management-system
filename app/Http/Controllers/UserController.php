<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Section;
use App\Models\Video;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(){
        $user = Auth::user();
        // dd(json_encode($user->enrollments, JSON_PRETTY_PRINT));
        return view('profile',['user'=>$user]);
    }
    public function profileEdit(Request $request){
        $user = Auth::user();
        if($request->method() == 'PATCH'){
            $validated = $request->validate([
                'name'  => 'required|string|max:255',
                
                'bio'  => 'nullable|string|max:255',
                'avatar'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            if ($request->hasFile('avatar')) {
                $imagePath = $request->file('avatar')->store('uploads', 'public');
            }
            else {
                // If no new banner image is uploaded, keep the current banner image
                $imagePath = $user->avatar;
            }
            $user->update([
                'name'      => $validated['name'],
                
                'bio'       => $validated['bio'],
                'avatar'    => $imagePath,
            ]);
            return redirect('/profile');
        }
        // dd(json_encode($user->enrollments, JSON_PRETTY_PRINT));
        return view('UserSetting',['user'=>$user]);
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
        // dd($user->enrollments);
        // Check if the user is enrolled in the course
        if (!$user->enrollments->contains('course_id', $course_id)) {
            return redirect("/")->with('error', 'You are not enrolled in this course.');
        }
    
        // Fetch the course with sections and videos using eager loading
        $course = Course::where('id', $course_id)
            ->first();
        // dd($course);
        // Validate if the course, section, and video exist
        if (!$course) {
            return redirect("/")->with('error', 'Course not found.');
        }
    
        // $section = Section::where('id', $section_id)->where('course_id',$course_id)->first();
        // if (!$section) {
        //     return redirect("/")->with('error', 'Section not found.');
        // }
        $video = Video::where('id', $video_id)->where('course_id', $course_id)->where('section_id', $section_id)->first();
        // dd($video);
        // $video = $section->videos->where('id', $video_id)->first();
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
