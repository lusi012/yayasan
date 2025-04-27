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
            <h1>
                Lembaga Pelatihan Kerja Swasta <br>
                Yayasan Cahaya Ayu
            </h1>
        </article>

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
