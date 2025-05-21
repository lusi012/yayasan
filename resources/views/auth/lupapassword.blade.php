<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('lupapassword/style.css') }}">
</head>

<body>
    @include('sweetalert::alert')

    <div class="wrapper">
        <form action="{{ route('admin.loginproses') }}" method="POST">
            @csrf

            <div class="form-header">
                <a href="{{ route('admin.login') }}" class="back-link">← Kembali</a>
            </div>

            <div class="avatar">
                <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar">
            </div>

            <h2>ATUR ULANG PASSWORD</h2>

            <div class="input-field">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="input-field">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required>
            </div>

            <button type="submit" class="login-btn">Reset</button>
        </form>
    </div>
</body>

</html>
