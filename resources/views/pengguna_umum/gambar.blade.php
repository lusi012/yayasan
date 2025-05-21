@extends('pengguna_umum.layout.main')

@section('title', 'Galeri - Yayasan Cahaya Ayu Kota Pontianak')

@section('content')
    <h1 class="galeri-heading">GALERI</h1>

    {{-- Galeri Gambar --}}
    <div class="grid gap-2 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 justify-items-center">
        @foreach ($galleries as $gallery)
            <div class="overflow-hidden rounded-lg shadow-lg transform hover:scale-105 transition duration-300 bg-white dark:bg-gray-800 w-64 cursor-pointer"
                onclick="openModal('{{ asset('storage/' . $gallery->foto) }}', '{{ $gallery->judul }}')">
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

    {{-- Modal Pop-up --}}
    <div id="imageModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-75 flex justify-center"
        style="padding-top: 80px; box-sizing: border-box;">
        <div class="relative max-w-3xl w-full">
            <button onclick="closeModal()" class="absolute top-2 right-2 text-white text-2xl">&times;</button>
            <img id="modalImage" src="" alt="" class="w-full max-h-[80vh] object-contain rounded-lg" />
            <p id="modalCaption" class="text-center text-white mt-2 text-lg"></p>
        </div>
    </div>

    {{-- Script Modal --}}
    <script>
        function openModal(imageUrl, caption) {
            document.getElementById('imageModal').classList.remove('hidden');
            document.getElementById('modalImage').src = imageUrl;
            document.getElementById('modalCaption').textContent = caption;
        }

        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
            document.getElementById('modalImage').src = '';
            document.getElementById('modalCaption').textContent = '';
        }

        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
@endsection
