<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Information - Yayasan Cahaya Ayu Kota Pontianak</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-black text-white">
    <header class="bg-black text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-lg font-bold"><H1>LPKS</H1>
                <h2>Yayasan Cahaya Ayu</h2></div>
            {{-- Navbar --}}
            @include('pengguna_umum.layout.navbar')
            @yield('content')
        </div>
    </header>
    <main class="container mx-auto py-8">

        <h1 class="text-4xl font-bold mb-6 text-center">VISI : </h1>
        <p class="text-lg mb-4">
            Yayasan cahaya Ayu merupakan yayasan yang menyediakan pelatihan kerja swasta
            bagi kebutuhan masyarakat yang putus sekolah dan ingin bekerja.
        </p>
        <h2 class="text-2xl font-bold mb-4">MISI : </h2>
        <p class="text-lg mb-4">
            Misi dari Yayasan Cahaya Ayu ini adalah menyediakan tenaga kerja yang handal dan
            berkualitas sehingga menjadikan tenaga kerja profesional
        </p>
        <h2 class="text-2xl font-bold mb-4">MENYEDIAKAN LAYANAN : </h2>
        <ul class="list-disc list-inside mb-4">
            <li>Baby sitter</li>
            <li>Perawat Lansia</li>
            <li>ART (Asisten Rumah Tangga)</li>
        </ul>
    </main>
    <footer class="bg-black text-white py-4 text-center">
        <p>&copy; 2023 Yayasan Cahaya Ayu Kota Pontianak.</p>
    </footer>
</body>

</html>
