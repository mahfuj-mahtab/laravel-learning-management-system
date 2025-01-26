<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index']);

// routes for users 
Route::view('/register', 'register');
Route::get('/login', function(){
    return view('login');
})->name('login');
Route::post('/register', [UserAuthController::class,'register']);
Route::post('/login', [UserAuthController::class,'login']);
Route::get('/profile', [UserController::class,'profile'])->middleware('auth');
// Route::get('/', [UserController::class,'profile']);


Route::get('/course/{course_id}/{course_title}/', [CourseController::class,'showCourse']);