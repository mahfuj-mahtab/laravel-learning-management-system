<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Laravel\Socialite\Facades\Socialite;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Webhook;
use Stripe\Event;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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

Route::post('/profile/course/{course_id}/enroll/', [CourseController::class,'profile_course_enroll'])->middleware('auth');

Route::get('/profile/course/{course_id}/section/{section_id}/video/{video_id}/', [UserController::class,'profile_course_video'])->middleware('auth');

// Route::get('/', [UserController::class,'profile']);


Route::get('/course/{course_id}/{course_title}/', [CourseController::class,'showCourse']);

Route::post('/checkout', function(){
    Stripe::setApiKey('sk_test_51O2XiNAI0AhoVGU2aREROYBMBIU4J9S9VUIn45rVHQ5z7cbACqEUTBV7E4GTa8omyfk3AFR2vpBHs3tgk0RargU600Ql0AWMdR');

    $YOUR_DOMAIN = 'http://127.0.0.1:8000';
    try {
        $checkout_session = Session::create([
            'line_items' => [[
              # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
              'price' => 'price_1O2Y57AI0AhoVGU25C5aW6bt',
              'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $YOUR_DOMAIN . '/success.html',
            'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
          ]);
          return redirect()->away($checkout_session->url);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
    
    
    
});



// login with google 

Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google.login');

Route::get('/auth/google/callback', function () {
    try {
        $googleUser = Socialite::driver('google')->user();

        // Find or create user
        $user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'avatar' => 'default.jpg',
                'role' => 'user',
                'password' => bcrypt(str()->random(24)), // Random password
            ]
        );

        Auth::login($user);

        return redirect('/profile'); // Redirect to dashboard after login
    } catch (\Exception $e) {
        return redirect('/login')->with('error', 'Google login failed');
    }
});



// Route::post('/webhook', function (Request $request) {
//     try {
//         Stripe::setApiKey(env('STRIPE_SECRET'));

//         $payload = @file_get_contents('php://input');
//         $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';
//         $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

//         try {
//             $event = Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
//         } catch (\UnexpectedValueException $e) {
//             // Invalid payload
//             return response()->json(['error' => 'Invalid payload'], 400);
//         } catch (\Stripe\Exception\SignatureVerificationException $e) {
//             // Invalid signature
//             return response()->json(['error' => 'Invalid signature'], 400);
//         }

//         // Handle the event
//         switch ($event->type) {
//             case 'checkout.session.completed':
//                 $session = $event->data->object;
//                 Log::info('Payment successful for session: ' . $session->id);
                
//                 // Call function to handle fulfillment
//                 handlePaymentSuccess($session);
//                 break;
            
//             default:
//                 Log::info('Unhandled event type: ' . $event->type);
//         }

//         return response()->json(['status' => 'success']);
//     } catch (\Exception $e) {
//         Log::error('Webhook error: ' . $e->getMessage());
//         return response()->json(['error' => 'Something went wrong'], 500);
//     }
// });