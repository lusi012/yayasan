<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Visitor;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Config;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Ambil base URL dari config
        $baseUrl = rtrim(Config::get('app.url'), '/'); // contoh: http://localhost

        // Daftar URL
        $urls = [
            $baseUrl . '/',
            $baseUrl . '/gambar',
            $baseUrl . '/informasi',
            $baseUrl . '/contact',
        ];

        // Tanggal hari ini
        $today = now(); // Carbon\Carbon instance

        // Buat 20 entri dengan created_at = hari ini
        for ($i = 0; $i < 20; $i++) {
            Visitor::create([
                'ip_address' => $faker->ipv4,
                'user_agent' => $faker->userAgent,
                'url' => $urls[array_rand($urls)],
                'created_at' => $today,
                'updated_at' => $today,
            ]);
        }

        // Buat 180 entri acak dalam setahun terakhir
        for ($i = 0; $i < 180; $i++) {
            Visitor::create([
                'ip_address' => $faker->ipv4,
                'user_agent' => $faker->userAgent,
                'url' => $urls[array_rand($urls)],
                'created_at' => $faker->dateTimeThisYear(),
                'updated_at' => now(),
            ]);
        }
    }
}
