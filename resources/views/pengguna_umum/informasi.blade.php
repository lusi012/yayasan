<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Informasi - Yayasan Cahaya Ayu Kota Pontianak</title>
    <link rel="icon" type="image/png" href="{{ asset('tmp_admin/logo/logo1.jpg') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('yayasan/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        /* Perbaikan: Pastikan x-cloak disembunyikan */
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body x-data="{ openModalId: null }" :class="{ 'overflow-hidden': openModalId !== null }">
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
                <p>LPKS Cahaya Ayu adalah sebuah instansi pemerintah, dibawah naungan departemen tenaga kerja
                    (DEPNAKER).
                    Yayasan Cahaya Ayu merupakan Lembaga Pelatihan kerja swasta yang menyediakan keterampilan
                    pelatihan
                    tenaga kerja dan memenuhi kebutuhan masyarakat akan pelatihan keterampilan yang dapat
                    meningkatkan
                    peluang kerja dan kemandirian ekonomi.
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

        <section class="px-4 py-6 bg-gray-100 dark:bg-gray-900">
            <h2 class="text-2xl font-semibold mb-4 text-center text-white">Informasi</h2>
            <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 justify-items-center">
                @foreach ($informasis as $informasi)
                    <div class="relative">
                        <!-- Card -->
                        <div
                            class="overflow-hidden rounded-lg shadow-lg transform hover:scale-105 transition duration-300 bg-white dark:bg-gray-800 w-64">
                            <img src="{{ asset('storage/' . $informasi->foto) }}" alt="{{ $informasi->judul }}"
                                class="w-full h-48 object-cover" loading="lazy" />
                            <div class="p-4">
                                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                    {{ $informasi->judul }}</h2>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                    {{ Str::limit($informasi->deskripsi, 100) }}
                                </p>
                                <button
                                    onclick="window.location.href='{{ route('informasi.detail', $informasi->id_informasi) }}'"
                                    class="text-blue-600 dark:text-blue-400 text-sm font-semibold focus:outline-none">
                                    Details
                                </button>

                                {{-- <a href="{{ route('informasi.detail', $informasi->id) }}"
                                    class="text-blue-500 text-sm font-semibold mt-2 inline-block">Baca Selengkapnya</a> --}}

                                <p class="text-xs text-gray-500 mt-1">Tanggal:
                                    {{ \Carbon\Carbon::parse($informasi->tanggal)->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
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
