<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('login1/style.css') }}">
</head>

<body>
    <div class="wrapper">
        <form action="{{ route('admin.loginproses') }}" method="POST">
            @csrf
            <h2>Login</h2>
            <div class="input-field">
                <input type="text" name="username">
                <label>Username</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" required>
                <label>password</label>
            </div>
            <div class="forget">

                <a href="#">Forgot password?</a>
            </div>
            <button type="submit">Log In</button>
            <div class="register">
                <p>Don't have an account? <a href="#">hubungi admin</a></p>
            </div>
        </form>
    </div>
</body>

</html>
