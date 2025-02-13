<div class="container-fluid bg-light">
    <div class="row">
        @include('AdminLeftContainer')

        <div class="col border border-1">
        @include('AdminHeader')

            <div class="w-100">
                <div class="row">
                    <div class="col">
                        <h1 class="my-3">{{$course->title}}</h1>

                    </div>
                    <div class="col ">
                        <a href="/admin/course/module/add/{{$course->id}}" class="btn btn-outline-success btn-sm mt-4 float-end me-2">+ Module</a>
                        <a href="/admin/course/add/" class="btn btn-outline-success btn-sm mt-4 float-end me-2">+ Course</a>
                    </div>
                
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">

                </div>
            </div>
            @foreach ($course->modules as $module)
            
            <div class="container-fluid bg-dark w-100 py-5 rounded-3 mb-5">
            <table class="table">
                <thead class="">
                    <tr>
                    
                    <th scope="col" class="col-4">Title</th>
                    <th scope="col">Instructor's</th>
                    <th scope="col">Unlock Date</th>
                    <th scope="col">Status</th>
                    <td scope="col">Actions</td>

                    </tr>
                </thead>
                <tbody>
                    
                    
                    <tr>
                    <th scope="row">{{$module->title}}</th>
                    <td>{{$module->instructor->name}}</td>
                    <td>{{$module->unlock_date}}</del> </td>
                    <td>{{$module->status}}</td>
                    <td>
                    <!-- <a href="/admin/course/section/add/{{$course->id}}/module/{{ $module->id }}/">+section</a> -->
                    <div class="dropdown">
                        <button class="btn btn-outline-primary py-1 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-plus"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/admin/course/section/add/{{$course->id}}/module/{{ $module->id }}/"><i class="fa-solid fa-plus"></i> Section
                            </a></li>
                           
                        </ul>
                    </div>
                    </td>
                    </tr>
               
                    
                </tbody>

                
                </table>
                    <p class="text-light mx-2">{{ $module->details }}</p>
                
                
                    
                <table class="table">
                    <thead class="">
                        <tr class="table-success">
                            
                            <th scope="col" class="col-4">Title</th>
                            <th scope="col">Type</th>
                            <th scope="col">Video Type</th>
                            <th scope="col">Status</th>
                            <td scope="col">Actions</td>
                            
                        </tr>
                    </thead>
                    @foreach ($module->sections as $section)
                <tbody>
                    
                    
                    <tr class="table-secondary">
                    <th scope="row">{{$section->title}}</th>
                    <td>Section</td>
                    <td>--</del> </td>
                    <td>{{$section->status}}</td>
                    
                    <td>
                  
                    <div class="dropdown">
                        <button class="btn btn-outline-primary py-1 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-plus"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/admin/course/video/add/{{$course->id}}/module/{{ $module->id }}/section/{{ $section->id }}/"><i class="fa-solid fa-plus"></i> Video
                            </a></li>
                           
                        </ul>
                        </div>
                    </td>
                    </tr>
                   
                  
                   
                    @foreach ($section->videos as $video)
                    
                   
                    <tr>
                    <th scope="row">{{$video->title}}</th>
                    <td>Video</td>
                    <td>{{ $video->type }}</del> </td>
                    <td>{{$video->status}}</td>
                    <td>
                    <div class="dropdown">
                        <button class="btn btn-outline-primary py-1 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-plus"></i>
                        </button>
                        <ul class="dropdown-menu">
                          
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-plus"></i> Quiz</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-plus"></i> Article</a></li>
                        </ul>
                        </div>
                    <!-- <a href="/admin/course/section/add/{{$course->id}}/module/{{ $module->id }}/">+section</a> -->
                    </td>
                    </tr>
                    @endforeach
                  
                </tbody>
                
                @endforeach
                </table>
                </div>
            @endforeach
        </div>
        
    </div>
</div>
@include('AdminFooter')
