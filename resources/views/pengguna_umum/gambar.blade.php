{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Gallery - Yayasan Cahaya Ayu Kota Pontianak</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('yayasan/style.css') }}">
</head>

<body>
    <header>
        <div>
            {{-- Navbar --}}
{{-- @include('pengguna_umum.layout.navbar')
            @yield('content')
        </div>
    </header>

    <main class="container mx-auto py-8">
        <h1 class="text-4xl font-bold mb-6 text-center">Gallery</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            <div class="bg-gray-800 p-4">
                <img src="https://via.placeholder.com/300" alt="Gambar 1 " class="w-full h-auto" />
                <p class="mt-2 text-center">Detail Gambar 1 - Tanggal: 2025-01-01</p>
            </div>
            <div class="bg-gray-800 p-4">
                <img src="https://via.placeholder.com/300" alt="Gambar 2" class="w-full h-auto" />
                <p class="mt-2 text-center">Detail Gambar 2 - Tanggal: 2025-01-02</p>
            </div>
            <div class="bg-gray-800 p-4">
                <img src="https://via.placeholder.com/300" alt="Gallery Image 3" class="w-full h-auto" />
                <p class="mt-2 text-center">Detail Gambar 3- Tanggal: 2025-01-03</p>
            </div>
            <!-- Add more images as needed -->
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

</html> --}}

@extends('pengguna_umum.layout.main')

@section('title', 'Gallery - Yayasan Cahaya Ayu Kota Pontianak')

@section('content')
    <h1 class="galeri-heading">GALERI</h1>

    <div class="grid gap-2 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 justify-items-center">
        @foreach ($galleries as $gallery)
            <div
                class="overflow-hidden rounded-lg shadow-lg transform hover:scale-105 transition duration-300 bg-white dark:bg-gray-800 w-64">
                <img src="{{ asset('storage/' . $gallery->foto) }}" alt="{{ $gallery->judul }}"
                    class="w-full h-auto max-h-[400px] object-contain" loading="lazy" />

                <div class="p-4">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $gallery->judul }}</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                        Tanggal: {{ \Carbon\Carbon::parse($gallery->tanggal)->format('d M Y') }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
