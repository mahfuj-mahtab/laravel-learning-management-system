@include('header')

<div>
       
        <div class="profile_container">
          <div class="left_profile_container hide_in_responsive">
          <ProfileLeftList/>


          </div>
          <div class="middle_profile_container"> 
          
          <div class="profile_greeting_section">
            
        <div class="left_greeting_section">

                <h1 class="profile_greeting">Hello, <b> {{$user->name}} </b></h1> <br/>
                <img class='profile_greeting_profile_pic' src="" alt="" />
                <b class="coin_b_tag"> <i class="fa-solid fa-coins"></i> Coin : 1k</b>
                <b class="coin_b_tag"> <i class="fa-solid fa-gem"></i> Diamond : 1k</b> 
                <b class="coin_b_tag"> <i class="fa-solid fa-ranking-star"></i> Rank : <span class="rank_span">Noob</span> </b>
                
        </div>
   
   
    <div class="right_greeting_section"></div>
        
    </div>
  
    <div class="course_box_section">
        <h2 class="enrolled_course_h2">Enrolled Course</h2>
                

                   
                    <div class="middle_course_box_section">
                        @foreach ($user->enrollments as $course)
                        
                        <div class="course_box">
                            <img src="./asset/image/1.jpg" alt="" class="article_logo">
                            <h1 class="course_box_title"> {{$course->course->title}}</h1>
                            <span class="course_price">Price : {{$course->price}}{{$course->course->price}} Tk</span>
                            <!-- <a href="/profile/course/{{$course->id}}/section/{{$course->course->sections[0]->id}}/video/{{$course->course->sections[0]->videos[0]->id}}" class="course_details_btn">Details</a> -->
                        </div>
                        @endforeach
                      
                        
                    
                        
                    </div>
                    
               
              
            </div>
          </div>
       
        </div>
  
       
    </div>
@include('footer')