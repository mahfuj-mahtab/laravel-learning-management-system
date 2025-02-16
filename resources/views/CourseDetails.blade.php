@include('header')

<div>


    <div class="course_details_container">
        <div class="left_course_details_container">
            <div class="course_details_in_right_side">
                <div class="course_box_in_right">
                    <div class="course_trailer">
                        <iframe width="100%" height="100%" src="{{ $course->trailer }}" frameborder="0"></iframe>

                        
                    </div>
                    <h3 class="price">
                    {{$course->discount_price}}
                   </h3>
                        
                     
                   @if ($is_enrolled)
                      <a class="enroll-btn" href="/profile">Finish Course</a>
                      @elseif ($course->discount_price > 0)
                    
                        <form action="/checkout" method="POST">
                          @csrf
                          <button class="enroll-btn" type="submit" id="checkout-button">Checkout</button>
                        </form>
                      @else
                      <form action="/profile/course/{{$course->id}}/enroll/" method="POST">
                          @csrf
                          <button class="enroll-btn">Enroll</button>
                      </form>
                    
                    
                      @endif
                    
               
                  
                    <form action="/" method="get">
                        <input type="text" class="promo" name="coupon" placeholder="Promo Code" />
                        <input type="submit" value="Apply" class="promo-btn" />
                    </form>
                    
                  
                    <hr/>
                    <h3 class="course_include">What's Include</h3>
                    <div class="include_section">
                    <div class="left_include">
                        <ul>
                            <li><i class="fa-solid fa-play course_details_icon"></i> 120+ Videos</li>
                            <li><i class="fa-solid fa-clock course_details_icon"></i>50+ Hours</li>
                            <li><i class="fa-solid fa-file-lines course_details_icon"></i> 23+ Assignment</li>
                           
                        </ul>
                    </div>
                    <div class="right_include">
                        <ul>
                            <li><i class="fa-solid fa-chair course_details_icon"></i> 23 Remaining Seat</li>
                           
                            <li><i class="fa-solid fa-file-lines course_details_icon"></i> 22+ Articles</li>

                            <li><i class="fa-solid fa-play course_details_icon"></i> 2 Month Live Support</li>
                           
                        </ul>
                    </div>
                </div>
                </div>
                <div class="admission_time">
                    <div class="left_admission_time">
                        <p> Admission Start <br/> <b> 25 jan 2025</b> </p>
                    </div>
                    <div class="right_admission_time">
                        <p> Admission End <br/> <b> 30 jan 2025</b> </p>
                    </div>
                    
                </div> 
            </div>
            <div class="left_course_details">
            <h1 class="course_heading">{{$course->title}} </h1>
            <p class="course_short_p">{{$course->description}}</p>
            <div class="trial_section_in_course">
                    <div class="left_trial_section_in_course">
                        <b>আপনি কি একটি ফ্রী লাইভ ক্লাস করে দেখতে চান?</b>
                        <p>আমাদের সাথে একটি ফ্রী লাইভ ক্লাস করুন,দেখুন ক্লাস কেমন লাগে, যদি ভালো লাগে তাহলে জয়েন করুন।</p>
                    </div>
                    <div class="right_trial_section_in_course"><a class="book_free_class_btn" href="/trial">ফ্রী ক্লাস বুক করুন</a></div>
                </div>
                <!-- <h1 class="course_heading">{{$course->title}}</h1>
                <p class="course_short_p">{{$course->description}}</p> -->

                <div class="syllabus">
            <h3>Course Syllabus</h3>
       
           @foreach ($course->modules as $modules)
            @foreach ($modules->sections as $section)
            
           <div> 
               <div class="course_section" id="course_box" key={key}>
                   <div class="course_section_top"  >
                   <h3>{{ $section->title }}</h3>
                   
                 
               </div>
          

           <div class="course_section_bottom" id="bottom_course" key={key}>
        
             
            @foreach ($section->videos as $single_video)
            
            <div class="course_video" key={key}>
                <a href="/profile/course/{{$course->id}}/section/{{$section->id}}/video/{{$single_video->id}}"> 
                    <h3><i class="fas fa-check-square"></i> {{$single_video->title}}</h3> 
                </a>
            </div>
            @endforeach
           
        
           

           </div>
           
           </div>
           </div>
           @endforeach

           @endforeach
               
           
      


        </div>
   
                
                 
    


     

            <div class="instructor_section">
                <h3>Instructor's</h3>
              
                        
                <div class="instructor">
                    <img class="instructor_logo" src='' alt=""/>
                  
                    <h3>{{$course->instructor->name}}</h3>
                    <p>Full Stack Developer</p>
                  
                    <div class="instructor_social">
                        <ul>
                            <li><a href={teacher.fb_link}><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href={teacher.insta_link}><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href={teacher.youtube_link}><i class="fa-brands fa-youtube"></i></a></li>
                            <li><a href={teacher.github_link}><i class="fa-brands fa-github"></i></a></li>
                            <li><a href={teacher.linkedin_link}><i class="fa-brands fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                   
              
            </div>
            <h3 class="course_details_h3">Course Details</h3>
            <div class="course_details">
            <p>{{$course->description}}</p>

            </div>
        </div>
    </div>
        <div class="right_course_details_container">
            <div class="left_course_details">
            <div class="course_box_in_right">
                <div class="course_trailer">
                    <iframe width="100%" height="100%" src="{{ $course->trailer }}" frameborder="0"></iframe>

                </div>
                <h3 class="price">
                 {{$course->discount_price}} Tk

                   </h3>
                    
                   @if ($is_enrolled)
                      <a class="enroll-btn" href="/profile">Finish Course</a>
                      @elseif ($course->discount_price > 0)
                    
                        <form action="/checkout" method="POST">
                          @csrf
                          <button class="enroll-btn" type="submit" id="checkout-button">Checkout</button>
                        </form>
                      @else
                      <form action="/profile/course/{{$course->id}}/enroll/" method="POST">
                          @csrf
                          <button class="enroll-btn">Enroll</button>
                      </form>
                    
                    
                      @endif
                    
               
               
                    <form action="" method="get">
                    <input type="text" class="promo" name="coupon" placeholder="Promo Code" />
                    <input type="submit" value="Apply" class="promo-btn" />
                </form>
                
                <hr/>
                <h3 class="course_include">What's Include</h3>
                <div class="include_section">
                    <div class="left_include">
                        <ul>
                            <li><i class="fa-solid fa-play course_details_icon"></i> 12+ Videos</li>
                            <li><i class="fa-solid fa-clock course_details_icon"></i>11+ Hours</li>
                            <li><i class="fa-solid fa-file-lines course_details_icon"></i> 12+ Assignment</li>
                           
                        </ul>
                    </div>
                    <div class="right_include">
                        <ul>
                            <li><i class="fa-solid fa-chair course_details_icon"></i> 23 Remaining Seat</li>
                           
                            <li><i class="fa-solid fa-file-lines course_details_icon"></i> 22+ Articles</li>
                            <li><i class="fa-solid fa-play course_details_icon"></i> 11 Month Live Support</li>
                           
                        </ul>
                    </div>
                </div>
            </div>
            <div class="admission_time">
                <div class="left_admission_time">
                    <p> Admission Start <br/> <b> 21 jan 2025 </b> </p>
                </div>
                <div class="right_admission_time">
                    <p> Admission End <br/> <b> 35 jan 2025</b> </p>
                </div>
                
            </div>
            </div>
            <div class="right_course_details_in_small_size">
                <div class="trial_section_in_course">
                    <div class="left_trial_section_in_course">
                        <b>আপনি কি একটি ফ্রী লাইভ ক্লাস করে দেখতে চান?</b>
                        <p>আমাদের সাথে একটি ফ্রী লাইভ ক্লাস করুন,দেখুন ক্লাস কেমন লাগে, যদি ভালো লাগে তাহলে জয়েন করুন।</p>
                    </div>
                    <div class="right_trial_section_in_course"><a class="book_free_class_btn" href="/trial">ফ্রী ক্লাস বুক করুন</a></div>
                </div>
                <h1 class="course_heading">{{$course->title}}</h1>
                <p class="course_short_p">{{$course->description}}</p>

                <div class="syllabus">
            <h3>Course Syllabus</h3>
       
           @foreach ($course->modules as $modules)
           @foreach ($modules->sections as $section)
           
           <div> 
               <div class="course_section" id="course_box" key={key}>
                   <div class="course_section_top"  >
                   <h3>{{ $section->title }}</h3>
                   
                 
               </div>
          

           <div class="course_section_bottom" id="bottom_course" key={key}>
        
             
            @foreach ($section->videos as $single_video)
            
            <div class="course_video" key={key}>
                <a href="/profile/course/{{$course->id}}/section/{{$section->id}}/video/{{$single_video->id}}"> 
                    <h3><i class="fas fa-check-square"></i> {{$single_video->title}}</h3> 
                </a>
            </div>
            @endforeach
            @endforeach
           
        
           

           </div>
           
           </div>
           </div>
           @endforeach
               
           
      


        </div>
   
                
                 
    


     

            <div class="instructor_section">
                <h3>Instructor's</h3>
              
                        
                <div class="instructor">
                    <img class="instructor_logo" src='' alt=""/>
                  
                    <h3>{{$course->instructor->name}}</h3>
                    <p>dfds</p>
                  
                    <div class="instructor_social">
                        <ul>
                            <li><a href={teacher.fb_link}><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href={teacher.insta_link}><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href={teacher.youtube_link}><i class="fa-brands fa-youtube"></i></a></li>
                            <li><a href={teacher.github_link}><i class="fa-brands fa-github"></i></a></li>
                            <li><a href={teacher.linkedin_link}><i class="fa-brands fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                   
              
            </div>
            <h3 class="course_details_h3">Course Details</h3>
            <div class="course_details">
            <p>{{$course->description}}</p>

            </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@include('footer')