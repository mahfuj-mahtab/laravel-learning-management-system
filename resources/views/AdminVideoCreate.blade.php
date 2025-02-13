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
            <form class="w-50" action="/admin/course/video/add/{{$course_id}}/module/{{ $module_id }}/section/{{ $section_id }}/" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Video Title</label>
                    <input name="title" type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Introduction" required>
                </div>
             
                <div class="mb-3">
                    <label for="description" class="form-label">Video Description</label>
                    <input name="description" type="text" class="form-control" style="height:300px;" id="description" required>
                </div>

               
             
             

                <div class="mb-3">
                <label for="type" class="form-label">Video Type</label>
                <select name="type" class="form-select" aria-label="status" required>
                        <option selected value="EMBED">EMBED</option>
                        <option value="LIVE">LIVE</option>
                        <option value="UPLOAD">UPLOAD</option>
                       
                </select>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Embed Link</label>
                    <input name="embed_link" type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="https://youtube.com/" required>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Video Link</label>
                    <input name="video_link" type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="https://youtube.com/" required>
                </div>
                <div class="mb-3">
                <label for="status" class="form-label">Video Status</label>
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
