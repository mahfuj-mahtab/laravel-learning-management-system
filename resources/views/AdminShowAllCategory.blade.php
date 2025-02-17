<div class="container-fluid bg-light">
    <div class="row">
        @include('AdminLeftContainer')

        <div class="col border border-1">
        @include('AdminHeader')

            <div class="w-100">
                <div class="row">
                    <div class="col">
                        <h1 class="my-3">All Category</h1>

                    </div>
                    <div class="col ">
                        <a href="/admin/categories/create/" class="btn btn-outline-success btn-sm mt-4 float-end">+ Category</a>
                        <a href="/admin/sub_category/create/" class="btn btn-outline-success btn-sm mt-4 float-end">+ Sub Category</a>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead class="table-success ">
                    <tr>
                    
                    <th scope="col" class="col-4">Title</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Status</th>
                    <td>Actions</td>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    
                    <tr>
                    <th scope="row">{{$category->name}}</th>
                    <td>{{$category->created_by}}</td>
                   
                    <td>{{$category->status}}</td>
                    <td>
                        <a href="/admin/course/{{$category->id}}/" class="text-dark"><i class="fa-solid fa-square-caret-right"></i></a>
                        <a href="" class="text-dark"><i class="fa-solid fa-pen-to-square"></i></a>

                    </td>
                    </tr>
                    @endforeach
                    
                </tbody>
                </table>
        </div>
        
    </div>
</div>
@include('AdminFooter')
