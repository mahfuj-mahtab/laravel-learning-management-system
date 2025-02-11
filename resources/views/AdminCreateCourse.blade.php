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


            <form class="w-50" action="/admin/course/add/" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Course Title</label>
                    <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Complete Python Course ....">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Course Short Description</label>
                    <input name="short_description" type="text" class="form-control" style="height:100px;" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Course  Description</label>
                    <input name="description" type="text" class="form-control" style="height:300px;" id="exampleInputPassword1">
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Course Banner Image</label>
                    <input  name="banner_image" class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-3">
                <label for="formFile" class="form-label">Course Type</label>
                <select name="type" class="form-select" aria-label="Default select example">
                        <option selected value="REGULAR">REGULAR</option>
                        <option value="LIVE">LIVE</option>
                       
                </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Course Instructor's</label>
                    <div class="form-check">
                        <input name="instructor" value="instructor1" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Mahfuj Mahtab Mohot
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="instructor" value="instructor2" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Mahfuj Mahtab Mohot
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="instructor" value="instructor3" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Mahfuj Mahtab Mohot
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                <label for="formFile" class="form-label">Course Category</label>

                    <div class="mb-1 form-check">
                        <input type="radio" name="sub_category" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Category 1</label>
                    </div>
                    <div class="mb-1 form-check">
                        <input type="radio" name="sub_category" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Category 1</label>
                    </div>
                    <div class="mb-1 form-check">
                        <input type="radio" name="sub_category" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Category 1</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Course Price</label>
                    <input name="price" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="1500">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Course Discount Price</label>
                    <input name="discount_price" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="1200">
                </div>

                <div class="mb-3">
                <label for="formFile" class="form-label">Course Status</label>
                <select name="status" class="form-select" aria-label="Default select example">
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
