<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Kontak - Yayasan Cahaya Ayu</title>
    <link rel="icon" type="image/png" href="{{ asset('tmp_admin/logo/logo1.jpg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('yayasan/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <header>
        <div>
            {{-- Navbar --}}
            @include('pengguna_umum.layout.navbar')
            @yield('content')
        </div>
    </header>

    <main>
        <section class="info-section">
            <h1>INFORMASI KONTAK</h1>
            <div class="info-container">
                <!-- About Club -->
                <div class="info-box">
                    <div class="icon-circle">
                        <i class="fas fa-running"></i>
                    </div>
                    <h3>EMAIL</h3>
                    <p>wayan1407@gmail.com.com</p>
                </div>

                <!-- Phone -->
                <div class="info-box">
                    <div class="icon-circle">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3>TELEPON</h3>
                    <p>0852-4503-5678</p>
                </div>

                <!-- Location -->
                <div class="info-box">
                    <div class="icon-circle">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>LOKASI YAYASAN</h3>
                    <p>Jalan dr Wahidin gg. batas pandang lurus &#177 500 m cari gg. gaharu 2 suka mulia Kecamatan
                        Pontianak
                        Barat, Sungai
                        Jawi Luar, Kec. Pontianak Kota, Kota Pontianak, Kalimantan Barat 78114</p>
                </div>
            </div>
            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1080.5342811150695!2d109.29998411559257!3d-0.03567678243365114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d5891a8262127%3A0x75eca621430c821d!2sLpks%20Cahaya%20Ayu!5e0!3m2!1sid!2sid!4v1744799276723!5m2!1sid!2sid"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Yayasan Cahaya Ayu Kota Pontianak</p>
        <ul class="social-footer">
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-tiktok"></i></a></li>
            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
        </ul>
    </footer>
</body>

</html>
