<form method="post" action="{{ route('login') }}">
    @csrf

    <label for="email">Email:</label>
    <input type="text" name="email"><br/><br/>

    <label for="password">Password:</label>
    <input type="password" name="password"><br/><br/>
    <button>Login</button><br/><br/>

    Don't have an account? <a href="{{route('register')}}">Register here</a>
</form>