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

    @include('sweetalert::alert')
    <div class="wrapper">
        <form action="{{ route('admin.loginproses') }}" method="POST">
            @csrf

            <div class="avatar">
                {{-- <img src="{{ asset('avatar.png') }}" alt="Avatar"> --}}
                <img src="{{ asset('tmp_admin/logo/logo1.jpg') }}" alt="Avatar">
            </div>

            <h2>LOGIN ADMIN</h2>

            <div class="input-field">
                <label>Username</label>
                <input type="text" name="username" required>

            </div>
            <div class="input-field">
                <label>Password</label>
                <input type="password" name="password" required>

            </div>

            {{-- <div class="options">
                <label><input type="checkbox" name="remember">Ingat Password</label>
                <a href="{{ route('auth.lupapassword') }}">Ubah Password?</a>
            </div> --}}

            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>
</body>

</html>
