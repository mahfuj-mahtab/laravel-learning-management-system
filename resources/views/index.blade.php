@include('header')


<div class="banner">
        <div class="left_banner">
            <div class="banner_title">
                <h1 class="banner_title_h1">Welcome To CoderHobo</h1> 
                <span class="banner_title_span">A Place For Pro Coder's</span>
            </div>
            <ul>
                <li><span class="icon_span" id="span_red">
                    <i class="fa-brands fa-youtube banner_icon_icon">
                    </i>
                </span>
                <span class="icon_span_title" id="span_red_title">Lots Of Free Youtube Videos</span>
                </li>
                <li>
                    <span class="icon_span" id="span_yellow" >
                        <i class="fa-solid fa-question banner_icon_icon"></i>
                    </span>
                    <span class="icon_span_title" id="span_yellow_title">Lots Of Free Quizes</span>
                </li>
                <li>
                    <span class="icon_span" id="span_magenda">
                        <i class="fa-solid fa-book-open banner_icon_icon"></i>
                    </span>
                    <span class="icon_span_title" id="span_magenda_title">Lots Of Free Article Course</span>
                </li>
                <a href="" class="btn">Youtube </a>
                <a href="" class="btn" id="course_btn">Course</a>
            </ul>

        </div>
        <div class="right_banner">
            <img src="./asset/image/im.png" alt="" class="banner_right_img">
        </div>
    </div>
    <div class="top_category_section">
        <div class="main_top_category_section">
            <h1 class="top_category_title">
                <span class="left_top_category_title">
                    <i class="fa-regular fa-copy"></i>Top</span>
                <span class="right_top_category_title"> Category</span>
            </h1>
            <p class="category_text">Here Are The List Of Top Category That People Love Each Category May Have Articl Course,Quiz or Course</p>
            <div class="category_box_section">
                <div class="category_box">
                    <div class="top_category_box">
                        <span class="top_category_box_heading"> <i class="fa-solid fa-droplet"></i> Python</span>
                    </div>
                    <div class="bottom_category_box">
                        <span id="article">24 Article </span>|
                        <span id="quiz"> 34 Quiz </span> |
                        <span id="course">11 Course</span>
                    </div>
                </div>
                <div class="category_box">
                    <div class="top_category_box">
                        <span class="top_category_box_heading"> <i class="fa-solid fa-droplet"></i>   Machine Leaarning</span>
                    </div>
                    <div class="bottom_category_box">
                        <span id="article">24 Article </span>|
                        <span id="quiz"> 34 Quiz </span> |
                        <span id="course">11 Course</span>
                    </div>
                </div>
                <div class="category_box">
                    <div class="top_category_box">
                        <span class="top_category_box_heading"> <i class="fa-solid fa-droplet"></i>  Python</span>
                    </div>
                    <div class="bottom_category_box">
                        <span id="article">24 Article </span>|
                        <span id="quiz"> 34 Quiz </span> |
                        <span id="course">11 Course</span>
                    </div>
                </div>
                <div class="category_box">
                    <div class="top_category_box">
                        <span class="top_category_box_heading"> <i class="fa-solid fa-droplet"></i>  Python</span>
                    </div>
                    <div class="bottom_category_box">
                        <span id="article">24 Article </span>|
                        <span id="quiz"> 34 Quiz </span> |
                        <span id="course">11 Course</span>
                    </div>
                </div>
                <div class="category_box">
                    <div class="top_category_box">
                        <span class="top_category_box_heading"> <i class="fa-solid fa-droplet"></i>  Python</span>
                    </div>
                    <div class="bottom_category_box">
                        <span id="article">24 Article </span>|
                        <span id="quiz"> 34 Quiz </span> |
                        <span id="course">11 Course</span>
                    </div>
                </div>
                <div class="category_box">
                    <div class="top_category_box">
                        <span class="top_category_box_heading"> <i class="fa-solid fa-droplet"></i>  Python</span>
                    </div>
                    <div class="bottom_category_box">
                        <span id="article">24 Article </span>|
                        <span id="quiz"> 34 Quiz </span> |
                        <span id="course">11 Course</span>
                    </div>
                </div>
                <div class="category_box">
                    <div class="top_category_box">
                        <span class="top_category_box_heading"> <i class="fa-solid fa-droplet"></i>  Python</span>
                    </div>
                    <div class="bottom_category_box">
                        <span id="article">24 Article </span>|
                        <span id="quiz"> 34 Quiz </span> |
                        <span id="course">11 Course</span>
                    </div>
                </div>
                <div class="category_box">
                    <div class="top_category_box">
                        <span class="top_category_box_heading"> <i class="fa-solid fa-droplet"></i>  Python</span>
                    </div>
                    <div class="bottom_category_box">
                        <span id="article">24 Article </span>|
                        <span id="quiz"> 34 Quiz </span> |
                        <span id="course">11 Course</span>
                    </div>
                </div>
       
            
         
        
           
            </div>
            <a href="" class="see_more_category">See More Category</a>
        </div>
    </div>


   
    

    



    <div class="top_course_section">
        <div class="main_top_course_section">
            <h1 class="top_course_title">
                <span class="left_top_course_title">
                    <i class="fa-regular fa-copy"></i>Top</span>
                <span class="right_top_course_title"> Course</span>
            </h1>
            <p class="article_text" id="article_text">Here Are The List Of Top Category That People Love Each Category May Have Articl Course,Quiz or Course</p>
            <div class="course_box_section">
                <div class="top_course_box_section">

                    <div class="left_course_box_section">
                        <i class="fa-solid fa-caret-left"></i>
                    </div>
                    <div class="middle_course_box_section">
                        @foreach ($courses as $course)
                        
                        <div class="course_box">
                            <img src="./asset/image/1.jpg" alt="" class="article_logo">
                            <h1 class="course_box_title"> {{$course->title}}</h1>
                            <span class="course_price">Price : {{$course->price}} Tk</span>
                            <a href="" class="course_details_btn">Details</a>
                        </div>
                        @endforeach
                      
                        <div class="course_box_m">
                           
                            <a href="" class="course_details_btn">See More Course</a>
                        </div>
                    
                        
                    </div>
                    <div class="right_course_box_section">
                        <i class="fa-solid fa-caret-right"></i>
                    </div>
                </div>
                <div class="bottom_course_box_section">

                    <a href="" class="see_more_article">See More Article</a>
                </div>
            </div>
        </div>
    </div>
@include('footer')