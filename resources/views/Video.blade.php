@include('header')

<div>
        <div class="video_play_course_details_container">
    <div class="video_play_left_course_details_container">
        
    <br> <br> <br>
        <div class="video_player">
       
          
            <iframe src={{$video->embed_link}} width="100%" height="100%" frameBorder="0" allow="accelerometer" clipboard-write='true' encrypted-media='true' gyroscope='true' referrerPolicy="strict-origin-when-cross-origin" allowFullScreen></iframe>
        
            

        </div>
       <div class="video_links">
        <ul>
            <div class="left_video_links">
            <li>
                <a id="active_description" href="#">Description</a>
            </li>
         
            
           
            
          
            <li>
                <a href="">Resource <i class="fa-solid fa-download"></i></a>
            </li>
         
      
           
          
            
        </div>
        <div class="right_video_links">
            <li class="mark_done_link">
        
            <form onSubmit={handleSubmit(onVideoProgressSubmit)}>
                 
            <input type="submit" id="mark_done_link_a" value="Mark As Done" />
        </form>
           
                
            
          
           
         
            </li>
        </div>
        </ul>
       </div>
    
    </div>
    <div class="video_play_right_course_details_container">
        <br> <br>
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
    </div>
</div>
        </div>



@include('footer')