<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('tmp_admin/logo/logo1.jpg') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('yayasan/style.css') }}">
</head>

<body>
    <header>
        {{-- Memanggil navbar dari file terpisah --}}
        @include('pengguna_umum.layout.navbar')
    </header>

    <main class="max-w-screen-xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2023 Yayasan Cahaya Ayu Kota Pontianak</p>
        <ul class="social-footer">
            <li><a
                    href="https://www.instagram.com/lpks_cahayaayu?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i
                        class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-tiktok"></i></a></li>
            <li><a href="https://www.youtube.com/@lpkscahayaayu_pontianak9918"><i class="fab fa-youtube"></i></a>
            </li>
        </ul>
    </footer>
</body>

</html>
