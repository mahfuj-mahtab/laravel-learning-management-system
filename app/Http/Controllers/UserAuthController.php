<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserAuthController extends Controller
{
    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);
        User::create(["name" => $request-> name,'email'=> $request-> email, "password" => bcrypt($request-> password),"avatar"=>"default.jpg","role" => "INSTRUCTOR"]);
        
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
    public function Recovery(Request $request){
        if($request->method() == 'POST'){

            $validatedData = $request->validate([
                'email' => 'required|email',
          
            ]);
            $user = User::where('email', $validatedData['email'])->first();
    
            if ($user) {
                $otp = rand(100000, 999999);
                $expiresAt = Carbon::now()->addMinutes(10); // OTP expires in 10 minutes

                // Store OTP in password_resets table
                DB::table('password_resets')->updateOrInsert(
                    ['email' => $request->email],
                    ['otp' => $otp, 'otp_expires_at' => $expiresAt, 'created_at' => now()]
                );

                // Send OTP via email
                Mail::raw("Your password reset OTP is: $otp", function ($message) use ($request) {
                    $message->to($request->email)->subject('Password Reset OTP');
                });
                // dd('user');
                // $request->session()->regenerate();
                // return redirect()->intended('/profile');
            }
            else{
                dd('no user');
            }
        }
        return view('PasswordRecovery');
        // return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }
}
