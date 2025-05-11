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
            <h2>RESET PASSWORD ADMIN</h2>
            <div class="input-field">
                <input type="text" name="username">
                <label>Password</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" required>
                <label>Konfirmasi Password</label>
            </div>
            <button type="submit">Reset</button>
        </form>
    </div>
</body>

</html>
