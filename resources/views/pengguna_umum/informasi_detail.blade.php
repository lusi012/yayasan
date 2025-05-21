<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>{{ $informasi->judul }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 p-6">

    {{-- Tombol Kembali --}}
    <a href="{{ route('informasi') }}" class="text-blue-600 hover:underline mb-4 inline-block">&larr; Kembali ke Informasi</a>

    {{-- Judul --}}
    <h1 class="text-3xl font-bold mb-4">{{ $informasi->judul }}</h1>

    {{-- Gambar --}}
    <img src="{{ asset('storage/' . $informasi->foto) }}" alt="{{ $informasi->judul }}"
        class="w-full max-w-3xl mb-6 rounded shadow-lg object-contain" />

    {{-- Deskripsi --}}
    <div class="prose dark:prose-invert max-w-3xl">
        {!! nl2br(e($informasi->deskripsi)) !!}
    </div>

    {{-- Tanggal --}}
    <p class="text-sm italic text-gray-600 dark:text-gray-400 mt-4">
        Tanggal: {{ \Carbon\Carbon::parse($informasi->tanggal)->format('d M Y') }}
    </p>

</body>
</html>
