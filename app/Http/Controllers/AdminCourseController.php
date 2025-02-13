<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use App\Models\Section;
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
    public function AdminModuleCreate(Request $request, $course_id){
        if($request->method() == 'POST'){
               
                $validated = $request->validate([
                    'title'            => 'required|string|max:255',
                    'description'      => 'required|string',
                    'date'             => 'required',
                    'instructor'       => 'required|exists:users,id',
                    'status'           => 'required|in:DRAFT,ACTIVE,INACTIVE',
                ]);
        
                
        
                $modules = Module::where('course_id', $course_id)->orderBy('order','DESC')->get();
                $order = 1;
                // dd($modules[0]->order);
                // dd($modules);
                if($modules->isNotEmpty()){
                        $order = $modules[0]->order + 1;
        }
                $module = Module::create([
                    'title'            => $validated['title'],
                    'details'          => $validated['description'],
                    'course_id'        => $course_id,
                    'unlock_date'      => $validated['date'],
                    'order'            => $order,
                    'instructor_id'    => $validated['instructor'],
                    'status'           => $validated['status'],
                ]);
        
                return redirect()->back()->with('success', 'Course created successfully!');
            
        }
        $instructors = User::where('role', 'INSTRUCTOR')->get();
        $course = Course::findOrFail($course_id);
        return view('AdminModuleCreate',['instructors'=>$instructors,'course_id'=> $course_id]);

    }
    public function AdminSectionCreate(Request $request, $course_id,$module_id){
        if($request->method() == 'POST'){
               
                $validated = $request->validate([
                    'title'            => 'required|string|max:255',
                    'description'      => 'required|string',
                    'status'           => 'required|in:DRAFT,ACTIVE,INACTIVE',
                ]);
        
                
        
                $sections = Section::where('course_id', $course_id)->where('module_id', $module_id)->orderBy('order','DESC')->get();
                $order = 1;
                // dd($modules[0]->order);
                // dd($modules);
                if($sections->isNotEmpty()){
                        $order = $sections[0]->order + 1;
        }
                $section = Section::create([
                    'title'            => $validated['title'],
                    'details'          => $validated['description'],
                    'course_id'        => $course_id,
                    'module_id'        => $module_id,
                    'order'            => $order,
                    'status'           => $validated['status'],
                ]);
        
                return redirect(sprintf('/admin/course/%d/', $course_id));

            
        }
        // $course = Course::findOrFail($course_id);
        // $module = Module::findOrFail($module_id);
        $module = Module::where('id', $module_id)->where('course_id', $course_id)->first();
        if(!$module){
            return redirect('/admin/dashboard/');
        }
        return view('AdminSectionCreate',['course_id'=> $course_id,'module_id'=> $module_id]);

    }
    public function AllCourses(){
        $courses = Course::all();
        return view('AdminAllCourse',['courses'=>$courses]);
    }
    public function SingleCoursesShow($id){
        $course = Course::findOrFail($id);
        return view('AdminSingleCourse',['course'=>$course]);
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
