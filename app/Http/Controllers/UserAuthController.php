<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);
        User::create(["name" => $request-> name,'email'=> $request-> email, "password" => bcrypt($request-> password),"avatar"=>"default.jpg","role" => "ADMIN"]);
        
        return view('register');
    }
    public function login(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // if(Auth::user()->role == 'ADMIN'){

            //     return redirect('/login');
            // }
            $request->session()->regenerate();
            return redirect()->intended('/profile');
        }
        
        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }
}
