@include('header')

<div>
       
        <div class="profile_container">
          <div class="left_profile_container hide_in_responsive">
         


          </div>
          <div class="middle_profile_container"> 
            <br>
          <div class="container mt-5">
          @if ($errors->any())
                <div>
                    <ul class="error_li">
                        @foreach ($errors->all() as $error)
                            <li >{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <h2>Change Profile Detailes</h2>
              <form class="pb-5" method="POST" enctype="multipart/form-data" action="/profile/edit/">
              @csrf
              @method('PATCH')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" aria-describedby="emailHelp" required value="{{ $user->name }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled value="{{ $user->email }}">
                </div>
                <div class="mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <input type="text" class="form-control" name="bio" id="bio" style="height: 100px" value="{{ $user->bio }}">
                </div>
                
                <div class="mb-3">
                    <label for="formFile" class="form-label">Avatar</label>
                    <input class="form-control" type="file" name="avatar" id="formFile">
                </div>
                <button class="">submit</button>
               
                </form>
          </div>
       
        </div>
  
       
    </div>
@include('footer')