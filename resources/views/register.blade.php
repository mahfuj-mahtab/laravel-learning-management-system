@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/register" method="POST">
    @csrf
    <label for="">full name</label> <br>
    <input type="text" name="name">  <br>
    <label for="">Email Address</label> <br>
    <input type="email" name="email">  <br>
    <label for="">Password</label> <br>
    <input type="password" name="password">  <br>
    <button>Register</button>
</form>