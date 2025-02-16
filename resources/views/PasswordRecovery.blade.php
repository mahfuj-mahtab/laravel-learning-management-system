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

                    <form action="/forgot-password" method="POST">
                    @csrf
                    

                <input type="email" name="email" placeholder="Enter Email">  <br>
                <!-- <input type="password" name="password" placeholder="Enter Pass">  <br> -->
              

                        <!-- <input type="text" name="firstname" id="" placeholder="Enter First Name" {...register("first_name", { required: true})}/> 
                  
                        <br/>                        
                        <input type="text" name="lastname" id="" placeholder="Enter Last  Name" {...register("last_name", { required: true})}/> 
                        <br/>                        
                        {/* <input type="text" name="username" id="" placeholder="Enter User Name"/> 
                        <span class="material-symbols-outlined">
                            account_circle
                            </span><br/> */}
                        <input type="email" name="email" id="" placeholder="Enter Email Address" {...register("email", { required: true})}/>
                       
                        <br/>
                        <input type="password" name="password" id="" placeholder="Enter Password" {...register("password")}/> 
                        {/* <input type="password" name="password" id="" placeholder="Enter Password" {...register("password", { required: true,minLength : 8, maxLength: 20,pattern: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm })}/>  */}
                     
                  
                        <br/>
                         -->
                       
                        <a href="/auth/google/" class="a_fb"> <i class="fa-brands fa-google"></i> Login With Google</a> 
                        
                        <br/>
                        <input type="submit" value="Recover"/>
                        <br/>
                        <span style="color: #869BA4; margin-left: 90px">Dont Have Account? <span style="color: #207398"> <b>  <a class="a_login" href="/register"> Register </a></b> </span></span>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>