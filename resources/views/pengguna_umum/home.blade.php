<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>User</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('yayasan/style.css') }}">

</head>

<body>
    <header>
        {{-- Navbar --}}
        @include('pengguna_umum.layout.navbar')
        @yield('content')
    </header>

    <main>
        {{-- Gambar home --}}
        <article class="slideshow-container">
            <img alt="image" src="{{ asset('tmp_admin/logo/gedung.jpeg') }}" class="slide showing">
            <img alt="image" src="{{ asset('tmp_admin/logo/lowongan.jpeg') }}" class="slide">

            <div class="dots">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
            </div>


            <script>
                let slideIndex = 0;
                let slides = document.getElementsByClassName("slide");
                let dots = document.getElementsByClassName("dot");

                showSlides();

                function showSlides() {
                    for (let i = 0; i < slides.length; i++) {
                        slides[i].classList.remove("showing");
                        slides[i].classList.remove("prev");
                        slides[i].classList.remove("next");
                    }

                    slideIndex++;
                    if (slideIndex > slides.length) {
                        slideIndex = 1;
                    }

                    let currentSlide = slides[slideIndex - 1];
                    let prevSlide = slides[(slideIndex - 2 + slides.length) % slides.length];
                    let nextSlide = slides[slideIndex % slides.length];

                    currentSlide.classList.add("showing");
                    prevSlide.classList.add("prev");
                    nextSlide.classList.add("next");

                    for (let i = 0; i < dots.length; i++) {
                        dots[i].classList.remove("active");
                    }

                    dots[slideIndex - 1].classList.add("active");

                    setTimeout(showSlides, 3000); // Ganti gambar tiap 3 detik
                }

                function currentSlide(n) {
                    slideIndex = n - 1;
                    showSlides();
                }
            </script>
        </article>

        <article class="judulhome">
            <img alt="image" src="{{ asset('tmp_admin/logo/logo1.jpg') }}">
            <h1>
                Lembaga Pelatihan Kerja Swasta <br>
                Yayasan Cahaya Ayu
            </h1>
        </article>

        {{-- layanan --}}
        <article class="layanan">
            <section class="layanan-section">
                <div class="judul-layanan">
                    <h2>LAYANAN</h2>
                    <div class="penanda"></div>
                </div>

                <div class="layanan-container">
                    <div class="layanan-item">
                        <div class="icon"><i class="fas fa-home"></i></div>
                        <h3>Asisten Rumah Tangga</h3>
                        <p>Kami menyediakan layanan pelatihan untuk calon asisten rumah tangga yang profesional,
                            terampil, dan siap kerja.</p>
                    </div>
                    <div class="layanan-item">
                        <div class="icon"><i class="fas fa-user-nurse"></i></div>
                        <h3>Perawat Lansia</h3>
                        <p>Pelatihan khusus untuk menjadi pendamping dan perawat lansia dengan pembekalan pengetahuan
                            dasar kesehatan dan etika kerja.</p>
                    </div>
                    <div class="layanan-item">
                        <div class="icon"><i class="fas fa-baby"></i></div>
                        <h3>Baby Sitter</h3>
                        <p>Layanan pelatihan baby sitter yang berkompeten dalam merawat dan mendampingi anak dengan
                            pendekatan kasih sayang dan profesional.</p>
                    </div>
                </div>
            </section>
        </article>

        {{-- informassi terbaru --}}
        <section class="informasi-terbaru-section">
            <h2 class="informasi-terbaru-title">Informasi Terbaru</h2>

            <div class="informasi-terbaru-grid">
                @foreach ($terbaru as $info)
                    <div class="informasi-item">
                        <img src="{{ asset('storage/' . $info->foto) }}" alt="{{ $info->judul }}"
                            class="informasi-image" loading="lazy">
                        <div class="informasi-content">
                            <h3 class="informasi-judul">{{ $info->judul }}</h3>
                            <p class="informasi-deskripsi">
                                {{ \Illuminate\Support\Str::limit($info->deskripsi, 80) }}
                            </p>
                            <p class="informasi-tanggal">Tanggal:
                                {{ \Carbon\Carbon::parse($info->tanggal)->format('d M Y') }}</p>
                        </div>
                    </div>
                @endforeach
            </div> <!-- Ini penutup grid informasi -->

            <!-- Tombol Lihat Lainnya -->
            <div class="mt-6 text-center">
                <a href="{{ route('informasi') }}"
                    class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                    Lihat Lainnya
                </a>

            </div>

            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Yayasan Cahaya Ayu Kota Pontianak</p>
        <ul class="social-footer">
            <li><a
                    href="https://www.instagram.com/lpks_cahayaayu?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i
                        class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-tiktok"></i></a></li>
            <li><a href="https://www.youtube.com/@lpkscahayaayu_pontianak9918"><i class="fab fa-youtube"></i></a></li>
        </ul>
    </footer>
</body>

</html>
