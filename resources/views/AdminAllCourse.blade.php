@include('AdminHeader')
<div class="container-fluid bg-light">
    <div class="row">
        @include('AdminLeftContainer')

        <div class="col border border-1">
            <div class="w-100">
                <div class="row">
                    <div class="col">
                        <h1 class="my-3">All Courses</h1>

                    </div>
                    <div class="col ">
                        <a href="/admin/course/add/" class="btn btn-outline-success btn-sm mt-4 float-end">+ Course</a>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead class="table-success ">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="col-4">Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">Instructor's</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                    
                    <tr>
                    <th scope="row">{{$course->title}}</th>
                    <td>{{$course->type}}</td>
                    <td>instructor name</td>
                    <td>{{$course->sub_category->name}}</td>
                    <td>{{$course->discount_price}} <del>{{$course->price}}</del> </td>
                    <td>{{$course->status}}</td>
                    </tr>
                    @endforeach
                    
                </tbody>
                </table>
        </div>
        
    </div>
</div>
@include('AdminFooter')
