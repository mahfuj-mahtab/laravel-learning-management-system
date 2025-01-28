<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
Route::get('/', [HomeController::class,'index']);

// routes for users 
Route::view('/register', 'register');
Route::get('/login', function(){
    return view('login');
})->name('login');

Route::post('/logout', function(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->middleware('auth')->name('logout');

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->middleware('guest')->name('password.request');


Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::ResetLinkSent
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');


Route::post('/register', [UserAuthController::class,'register']);
Route::post('/login', [UserAuthController::class,'login']);
Route::get('/profile', [UserController::class,'profile'])->middleware('auth');
Route::get('/profile/course/{course_id}/', [UserController::class,'profile_course'])->middleware('auth');
Route::get('/profile/course/{course_id}/section/{section_id}/video/{video_id}/', [UserController::class,'profile_course_video'])->middleware('auth');
// Route::get('/', [UserController::class,'profile']);


Route::get('/course/{course_id}/{course_title}/', [CourseController::class,'showCourse']);