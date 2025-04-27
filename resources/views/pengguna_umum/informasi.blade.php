<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Information - Yayasan Cahaya Ayu Kota Pontianak</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('yayasan/style.css') }}">
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
        <section class="sec1">
            <article class="artsec1">
                <h1>Tentang Perusahaan</h1>
                <p>LPKS Cahaya Ayu adalah sebuah instansi pemerintah, dibawah naungan departemen tenaga kerja (DEPNAKER).
                    Yayasan Cahaya Ayu merupakan Lembaga Pelatihan kerja swasta yang menyediakan keterampilan pelatihan tenaga kerja dan memenuhi kebutuhan masyarakat akan pelatihan keterampilan yang dapat meningkatkan peluang kerja dan kemandirian ekonomi.
                </p>
            </article>
            <article class="sec1img">

                <img alt="image" src="{{ asset('tmp_admin/logo/lowongan.jpeg') }}">

            </article>
        </section>

        <section class="visimisi-container">
          <article class="box">
            <h2>Visi</h2>
            <div class="content">
                <img alt="image" src="{{ asset('tmp_admin/logo/logo1.jpg') }}">
              <p>
                Yayasan Cahaya Ayu merupakan yayasan yang menyediakan pelatihan kerja swasta
                bagi kebutuhan masyarakat yang putus sekolah dan ingin bekerja.
              </p>
            </div>
          </article>

          <article class="box">
            <h2>Misi</h2>
            <div class="content">
                <img alt="image" src="{{ asset('tmp_admin/logo/logo1.jpg') }}">
              <p>
                Misi dari Yayasan Cahaya Ayu ini adalah menyediakan tenaga kerja yang handal dan
                berkualitas sehingga menjadikan tenaga kerja profesional.
              </p>
            </div>
          </article>
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
