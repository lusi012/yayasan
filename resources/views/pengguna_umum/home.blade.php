<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>User</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('yayasan/style.css')}}">

</head>

<body>
    <header>
            {{-- Navbar --}}
            @include('pengguna_umum.layout.navbar')
            @yield('content')
    </header>
    
    <main class="relative">
        <img alt="A woman in a green polka dot apron cleaning a table in a cozy kitchen"
            class="w-full h-screen object-cover opacity-50" height="1080"
            src="{{ asset('yayasan/UntitledDiagram.png') }}" width="1920" />
        <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4">
            <h2 class="text-5xl font-bold mb-4">
                Lembaga Pelatihan Kerja Swasta <br>
                Yayasan Cahaya Ayu
            </h2>

            <article class="artic1">
                <h1>Info Terbaru</h1>
                <img src="" alt="">
            </article>

            <p class="text-lg mb-6">
                Yayasan Cahaya Ayu merupakan Lembaga Pelatihan kerja swasta yang menyediakan keterampilan pelatihan
                tenaga kerja dan memenuhi kebutuhan masyarakat akan pelatihan keterampilan yang dapat meningkatkan
                peluang kerja dan kemandirian ekonomi.
            </p>
            <div class="flex space-x-9">
                <button class="bg-yellow-500 text-black px-6 py-2 font-bold">
                    NEXT
                </button>
                <button class="bg-black text-white border border-white px-6 py-2 font-bold">
                    PREVIEW
                </button>
            </div>
            <div class="flex space-x-9 mt-9">
                <a class="text-white text-2xl"
                    href="https://www.instagram.com/lpks_cahayaayu?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">
                    <i class="fab fa-instagram">
                    </i>
                    lkps_cahayaayu
                </a>
                <a class="text-white text-2xl" href="https://www.youtube.com/@lpkscahayaayu_pontianak9918">
                    <i class="fab fa-youtube">
                    </i>
                    lkps cahaya ayu_Pontianak
                </a>
                <a class="text-white text-2xl" href="#">
                    <i class="fab fa-facebook">
                    </i>
                    LKPS CAHAYA AYU
                </a>
                <a class="text-white text-2xl" href="#">
                    <i class="fab fa-tiktok">
                    </i>
                    lkps_cahayaayu
                </a>
            </div>
            <section id="contact" class="container mx-auto py-8 text-center">
                <h2 class="text-4xl font-bold mb-6"> HUBUNGI KAMI </h2>
                <p class="text-lg">Alamat : JL DR WAHIDIN, JL UJUNG PANDANG II, GG GAHARU NO 2</p>
            </section>
        </div>
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
