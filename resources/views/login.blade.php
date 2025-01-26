@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/login" method="POST">
    @csrf
    <label for="">Email</label><br>
    <input type="email" name="email"><br>

    <label for="">Password</label><br>
    <input type="password" name="password"> <br>

    <button>Login</button>
</form>