<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
   
    public function SingleCourseAdd(){
       return view('AdminCreateCourse');

    }
    public function AllCourses(){
        $courses = Course::all();
        return view('AdminAllCourse',['courses'=>$courses]);
    }
    public function SingleCoursesShow($id){
        $course = Course::findOrFail($id);
        return view('AdminSingleCourse',['courses'=>$course]);
    }
    public function SingleCoursesEdit($id){
        // $course = Course::findOrFail($id);
        // return view('AdminSingleCourse',['courses'=>$course]);
    }
    public function SingleCoursesDelete($id){
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect('/admin/courses/');
        // return view('AdminSingleCourse',['courses'=>$course]);
    }

}
