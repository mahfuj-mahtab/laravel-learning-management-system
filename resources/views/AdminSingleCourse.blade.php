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

                    </td>
                    </tr>
               
                    
                </tbody>
                </table>
                </div>
            @endforeach
        </div>
        
    </div>
</div>
@include('AdminFooter')
