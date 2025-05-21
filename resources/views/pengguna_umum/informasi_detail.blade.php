<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $informasi->judul }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-900 font-sans leading-relaxed">

    <div class="max-w-4xl mx-auto p-6">
        <a href="{{ route('informasi') }}"
            class="inline-flex items-center text-sm text-blue-600 hover:text-blue-800 transition mb-6">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali ke Informasi
        </a>

        <h1 class="text-4xl font-bold mb-4 text-center">{{ $informasi->judul }}</h1>

        <div class="mb-6">
            <img src="{{ asset('storage/' . $informasi->foto) }}" alt="{{ $informasi->judul }}"
                class="w-full max-h-[550px] object-cover rounded-lg shadow-md mx-auto" />
            {{-- <img src="{{ asset('storage/' . $informasi->foto) }}" alt="{{ $informasi->judul }}"
                class="w-[600px] h-auto object-contain rounded-lg shadow-md mx-auto" /> --}}



        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <p class="text-lg text-gray-800 mb-4 whitespace-pre-line">
                {{ $informasi->deskripsi }}
            </p>
            <p class="text-sm italic text-gray-500 text-right">
                Tanggal: {{ \Carbon\Carbon::parse($informasi->tanggal)->format('d M Y') }}
            </p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto p-6">
        <div class="flex justify-between items-center mb-6">

            <!-- Tombol WhatsApp -->
            <div class="mb-4">
                <a href="https://wa.me/?text={{ urlencode($informasi->judul . ' - ' . request()->fullUrl()) }}"
                    target="_blank"
                    class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded transition">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 32 32">
                        <path
                            d="M16 0c-8.837 0-16 7.163-16 16 0 2.837.743 5.498 2.154 7.884l-2.278 8.116 8.343-2.19c2.313 1.263 4.93 1.936 7.781 1.936 8.837 0 16-7.163 16-16s-7.163-16-16-16zM16 29.333c-2.493 0-4.907-.656-7.046-1.896l-.504-.292-4.96 1.303 1.324-4.712-.325-.484c-1.301-1.936-1.989-4.179-1.989-6.585 0-6.894 5.606-12.5 12.5-12.5s12.5 5.606 12.5 12.5-5.606 12.5-12.5 12.5zM22.449 19.898c-.304-.152-1.801-.891-2.082-.991s-.482-.152-.684.152-.784.991-.962 1.233c-.178.243-.356.273-.66.122-.304-.152-1.281-.472-2.439-1.506-.902-.8-1.51-1.785-1.686-2.089-.178-.304-.02-.468.132-.619.135-.135.304-.355.456-.533.152-.178.203-.304.304-.507.101-.203.05-.38-.025-.533s-.66-1.593-.905-2.181c-.237-.571-.478-.494-.66-.503l-.564-.01c-.203 0-.533.076-.812.38s-1.066 1.042-1.066 2.536 1.092 2.943 1.244 3.147c.152.203 2.145 3.271 5.204 4.588.727.313 1.294.499 1.735.637.729.232 1.391.2 1.917.122.584-.086 1.801-.735 2.057-1.447.253-.713.253-1.323.178-1.447-.075-.127-.279-.203-.584-.355z" />
                    </svg>
                    Bagikan ke WhatsApp
                </a>
            </div>
        </div>
    </div>
</body>

</html>
