<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href={{asset('css/register.css')}}>
</head>
<body>
    


@if ($errors->any())
    <div>
        <ul class="error_li">
            @foreach ($errors->all() as $error)
                <li >{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form >

</form>

<div class="container">
        <div class="main_container">
           
             

            <div class="login-box">
              
                <div class="left_login_box">
                    <img class="register-img" src="https://images.pexels.com/photos/6963098/pexels-photo-6963098.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt=""/>
                </div>
                <div class="right_login_box">
                    <h3 class="login_title">Login</h3>

                    <form action="/reset-password" method="POST">
                    @csrf
                    
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="email" name="email" required placeholder="Enter your email">
                    <input type="password" name="password" required placeholder="New Password">
                    <input type="password" name="password_confirmation" required placeholder="Confirm Password">
                    <button type="submit">Reset Password</button>
                       
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>