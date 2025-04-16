<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Contact - Yayasan Cahaya Ayu Kota Pontianak</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-black text-white">
    <header class="bg-black text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-lg font-bold">YAYASAN CAHAYA AYU KOTA PONTIANAK</div>
            
            <?php echo $__env->make('pengguna_umum.layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </header>
    <main class="container mx-auto py-8">
        <h1 class="text-4xl font-bold mb-6 text-center">HUBUNGI KAMI : </h1>
        <form class="max-w-lg mx-auto">
            <div class="mb-4">
                <label class="block text-lg mb-2" for="name">NAMA : </label>
                <input class="w-full p-2 border border-gray-300 rounded" type="text" id="name" required>
            </div>
            <div class="mb-4">
                <label class="block text-lg mb-2" for="email">EMAIL : </label>
                <input class="w-full p-2 border border-gray-300 rounded" type="email" id="email" required>
            </div>
            <div class="mb-4">
                <label class="block text-lg mb-2" for="message">PESAN : </label>
                <textarea class="w-full p-2 border border-gray-300 rounded" id="message" rows="4" required></textarea>
            </div>
            <button class="bg-yellow-500 text-black px-6 py-2 font-bold" type="submit">KIRIM PESAN</button>
        </form>
    </main>
    <footer class="bg-black text-white py-4 text-center">
        <p>&copy; 2025 Yayasan Cahaya Ayu Kota Pontianak.</p>
    </footer>
</body>

</html>
<?php /**PATH D:\laragon\www\yayasan\resources\views/pengguna_umum/contact.blade.php ENDPATH**/ ?>