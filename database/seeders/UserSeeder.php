<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userdata = [
            [
                "username" => "admin",
                "password"=> Hash::make("admin")
            ]
        ];
        foreach ($userdata as $user) {
            User::create($user);
        }
        //
    }
}
