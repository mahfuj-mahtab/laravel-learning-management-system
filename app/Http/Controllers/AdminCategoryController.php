<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sub_category;
use Auth;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function AllCategory(){
        $category = Category::all();
        return view('AdminShowAllCategory', ['categories'=>$category]);
    }
    public function CategoryCreate(Request $request){
        if($request->method() == 'POST'){
            $validated = $request->validate([
                'name'            => 'required|string|max:255',
                'image'     => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status'           => 'required|in:DRAFT,ACTIVE,INACTIVE',
            ]);
    
            // Upload Banner Image
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('uploads', 'public');
            }
            Category::create([
                'name' => $validated['name'],
                'image' => $imagePath,
                'status' => $validated['status'],
                'created_by' => Auth::user()->id
            ]);
            return redirect('/admin/categories/');
        }
        return view('AdminCreateCategory');
    }
    public function SubCategoryCreate(Request $request){
        if($request->method() == 'POST'){
            $validated = $request->validate([
                'name'            => 'required|string|max:255',
                'category'            => 'required',
                'image'     => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'status'           => 'required|in:DRAFT,ACTIVE,INACTIVE',
            ]);
    
            // Upload Banner Image
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('uploads', 'public');
            }
            Sub_category::create([
                'name' => $validated['name'],
                'image' => $imagePath,
                'category_id' => $validated['category'],
                'status' => $validated['status'],
                'created_by' => Auth::user()->id
            ]);
            return redirect('/admin/categories/');
        }
        $categories = Category::all();
        return view('AdminSubCategoryCreate',['categories'=>$categories]);
    }
}
