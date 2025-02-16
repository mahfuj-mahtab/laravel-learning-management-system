<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./asset/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Andika&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f23be647b6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset ('css/app.css')}}">
    <script src="https://js.stripe.com/v3/"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f23be647b6.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        
            <div class="top_header">
                <div class="top_main_header">
                    <div class="top_main_header_left">
                        <a href="/"><h1 class="logo">CoderHobo</h1></a> 
                    </div>
                    <div class="top_main_header_middle">
                        <ul>
                            <li><a href="">Course</a></li>
                            <li><a href="">Article</a></li>
                            <li><a href="">Quiz</a></li>
                            <li><a href="">Leaderboard</a></li>
                            <li><a href="">Blog</a></li>
                        </ul>
                    </div>
                    <div class="top_main_header_right">
                        <!-- <form action="/gg">
                            <input class="search_txt" type="text" placeholder="Search...">
                            <button class="search_btn"><i class="fa-solid fa-magnifying-glass search_btn_icon"></i></button>
                        </form> -->
                        
                        <a href="/profile">
                                <i  class="fa-solid fa-user icon">

                                    </i>
                            </a>
                            @auth
                                <form action="/logout/" method="POST">
                                    @csrf
                                    <button class="btn_logout" type="submit"><i class="fa-solid fa-right-from-bracket"></i></button>
                                </form>
                            @endauth
                        <i class="fa-solid fa-bars icon_bar"></i>
                    </div>
                </div>
            </div>
            <div class="bottom_header">
                <div class="bottom_main_header">
                    <ul>
                        <li><a href="">Python</a></li>
                        <li><a href="">C</a></li>
                        <li><a href="">Javascript</a></li>
                        <li><a href="">C++</a></li>
                        <li><a href="">Game</a></li>
                        <li><a href="">Website</a></li>
                        <li><a href="">Python</a></li>
                        <li><a href="">C++</a></li>
                        <li><a href="">Game</a></li>
                        <li><a href="">Website</a></li>
                        <li><a href="">Python</a></li>
                        <li><a href="">C++</a></li>
                        <li><a href="">Game</a></li>
                        <li><a href="">Website</a></li>
                        <li><a href="">Python</a></li>
                    </ul>
                </div>
            </div>
        
    </header>