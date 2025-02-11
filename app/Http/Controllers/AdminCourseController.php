<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Sub_category;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
   
    public function SingleCourseAdd(Request $request){
        if($request->method() == 'POST'){
            
                // Validation
                $validated = $request->validate([
                    'title'            => 'required|string|max:255',
                    'short_description'=> 'required|string|max:500',
                    'description'      => 'required|string',
                    'banner_image'     => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                    'type'             => 'required|in:LIVE,REGULAR',
                    'instructor'    => 'required|exists:users,id',
                    'sub_category'  => 'required|exists:sub_categories,id',
                    'price'            => 'required|numeric|min:0',
                    'discount_price'   => 'nullable|numeric|min:0|lt:price', // Must be less than price
                    'status'           => 'required|in:DRAFT,ACTIVE,INACTIVE',
                ]);
        
                // Upload Banner Image
                if ($request->hasFile('banner_image')) {
                    $imagePath = $request->file('banner_image')->store('uploads', 'public');
                }
        
                // Store Data
                $course = Course::create([
                    'title'            => $validated['title'],
                    'short_description'=> $validated['short_description'],
                    'description'      => $validated['description'],
                    'banner_image'     => $imagePath ?? null,
                    'type'             => $validated['type'],
                    'instructor_id'    => $validated['instructor'],
                    'sub_category_id'  => $validated['sub_category'],
                    'price'            => $validated['price'],
                    'discount_price'   => $validated['discount_price'] ?? 0,
                    'status'           => $validated['status'],
                ]);
        
                return redirect()->back()->with('success', 'Course created successfully!');
            
        }
        $instructors = User::where('role', 'INSTRUCTOR')->get();
        $category = Sub_category::all();
        return view('AdminCreateCourse',['instructors'=>$instructors, 'categories'=>$category]);

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
