<form action="{{route('register')}}" method="POST">
    @csrf
    <div class="form-input">
        <label for="email">Email</label><br>
        <input type="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
    </div>
    <div class="form-input">
        <label for="name">Username</label><br>
        <input type="text" name="name" placeholder="Enter Username" value="{{ old('name') }}">
    </div>
    <div class="form-input">
        <label for="password">Password</label><br>
        <input type="password" name="password" placeholder="Enter password" value="{{ old('password') }}">
    </div>

    <div class="form-input">
        <label for="password_confirmation">Confirm Password</label><br>
        <input type="password" name="password_confirmation" placeholder="Confirm password">
    </div>

    <br>
    <button type="submit">Register</button>
    <br>
    Already have an account? <a href="{{route('login')}}">Login here</a>
</form>