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
            <form class="w-50" action="/admin/course/add/" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Course Title</label>
                    <input name="title" type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Complete Python Course ...." required>
                </div>
                <div class="mb-3">
                    <label for="trailer" class="form-label">Course Trailer</label>
                    <input name="trailer" type="text" class="form-control" id="trailer" aria-describedby="emailHelp" placeholder="https://youtube.com" required>
                </div>
                <div class="mb-3">
                    <label for="short_description" class="form-label">Course Short Description</label>
                    <input name="short_description" type="text" class="form-control" style="height:100px;" id="short_description" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Course  Description</label>
                    <input name="description" type="text" class="form-control" style="height:300px;" id="description" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Course Banner Image</label>
                    <input  name="banner_image" class="form-control" type="file" id="image" required>
                </div>
                <div class="mb-3">
                <label for="type" class="form-label">Course Type</label>
                <select name="type" class="form-select" aria-label="type" required>
                        <option selected value="REGULAR">REGULAR</option>
                        <option value="LIVE">LIVE</option>
                       
                </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Course Instructor's</label>
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
                <label class="form-label">Course Category</label>
                    @foreach ($categories as $category)
                    
                    <div class="mb-1 form-check">
                        <input type="radio" name="sub_category" class="form-check-input" id="category" value={{$category->id}} required>
                        <label class="form-check-label" >{{$category->name}}</label>
                    </div>
                    @endforeach
                    
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Course Price</label>
                    <input name="price" type="number" class="form-control" id="price" aria-describedby="emailHelp" placeholder="1500" required>
                </div>
                <div class="mb-3">
                    <label for="discount_price" class="form-label">Course Discount Price</label>
                    <input name="discount_price" type="number" class="form-control" id="discount_price" aria-describedby="emailHelp" placeholder="1200" required>
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
