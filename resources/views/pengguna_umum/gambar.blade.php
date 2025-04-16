<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Gallery - Yayasan Cahaya Ayu Kota Pontianak</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('yayasan/style.css')}}">
</head>

<body>
    <header>
        <div>
            {{-- Navbar --}}
            @include('pengguna_umum.layout.navbar')
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

</html>
