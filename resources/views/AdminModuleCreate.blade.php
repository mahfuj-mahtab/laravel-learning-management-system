<div class="container-fluid bg-light">
    <div class="row">
        @include('AdminLeftContainer')

        <div class="col overflow-auto border border-1" style="height:100vh;">
        @include('AdminHeader')

        <div class="w-100">
                <div class="row">
                    <div class="col">
                        <h1 class="my-3">Create Course</h1>

                    </div>
                    <div class="col ">
                        <a href="/admin/course/add/" class="btn btn-outline-success btn-sm mt-4 float-end">+ Module</a>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div>
                    <ul class="error_li">
                        @foreach ($errors->all() as $error)
                            <li >{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="w-50" action="/admin/course/module/add/{{$course_id}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Module Title</label>
                    <input name="title" type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Complete Python Course ...." required>
                </div>
             
                <div class="mb-3">
                    <label for="description" class="form-label">Module  Description</label>
                    <input name="description" type="text" class="form-control" style="height:300px;" id="description" required>
                </div>

               
             
                <div class="mb-3">
                    <label class="form-label">Module Instructor's</label>
                    @foreach ($instructors as $instructor)
                    
                    <div class="form-check">
                        <input name="instructor" value={{$instructor->id}} class="form-check-input" type="radio" id="instructor" required>
                        <label class="form-check-label" >
                        {{$instructor->name}}
                        </label>
                    </div>
                    @endforeach
                   
                </div>
                <div class="mb-3">
                    <label for="unlock" class="form-label">Module  Unlock Date Time</label>
                    <input name="date" type="datetime-local" class="form-control" style="height:40px;" id="unlock" required>
                </div>

                <div class="mb-3">
                <label for="status" class="form-label">Course Status</label>
                <select name="status" class="form-select" aria-label="status" required>
                        <option selected value="DRAFT">DRAFT</option>
                        <option value="ACTIVE">ACTIVE</option>
                        <option value="INACTIVE">INACTIVE</option>
                       
                </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>


        </div>
        
    </div>
</div>
@include('AdminFooter')
