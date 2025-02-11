@include('AdminHeader')
<div class="container-fluid bg-light">
    <div class="row">
        @include('AdminLeftContainer')

        <div class="col border border-1">
        <div class="w-100">
                <div class="row">
                    <div class="col">
                        <h1 class="my-3">Create Course</h1>

                    </div>
                    <div class="col ">
                        <a href="/admin/course/add/" class="btn btn-outline-success btn-sm mt-4 float-end">+ Course</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@include('AdminFooter')
