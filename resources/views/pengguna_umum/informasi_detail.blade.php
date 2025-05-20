<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>{{ $informasi->judul }}</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 p-6">
    <a href="{{ route('informasi') }}" class="text-blue-600 hover:underline mb-4 inline-block">&larr; Kembali ke Informasi</a>

    <h1 class="text-3xl font-bold mb-4">{{ $informasi->judul }}</h1>
    <img src="{{ asset('storage/' . $informasi->foto) }}" alt="{{ $informasi->judul }}" class="w-full max-w-xl mb-6 rounded shadow" />

    <p class="mb-4">{{ $informasi->deskripsi }}</p>

    <p class="text-sm italic text-gray-600 dark:text-gray-400">Tanggal: {{ \Carbon\Carbon::parse($informasi->tanggal)->format('d M Y') }}</p>
</body>
</html>
