<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Absen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(36)->create();
        // User::factory()->create([
        //     'name' => 'Dimas Muliarasis',
        //     'username' => 'dimaskyy',
        //     'email' => 'admin@example.com',
        //     'no_telp' => '081234567890',
        //     'password' => bcrypt('password'),
        //     'pin' => '123456',
        //     'role' => 'admin',
        // ]);
        Absen::create([
            'user_id' => 1,
            'kategori' => 'Hadir',
            'alasan' => '-',
            'photo' => 'default.png',
            'long' => '107.659070',
            'lat' => '-6.967710',
            'status' => 'Menunggu',
        ]);
        Absen::create([
            'user_id' => 2,
            'kategori' => 'Telat',
            'alasan' => '-',
            'photo' => 'favicon.png',
            'long' => '107.659080',
            'lat' => '-6.967700',
            'status' => 'Menunggu',
        ]);
        Absen::create([
            'user_id' => 3,
            'kategori' => 'Hadir',
            'alasan' => '-',
            'photo' => 'falin4.jpg',
            'long' => '107.659075',
            'lat' => '-6.967710',
            'status' => 'Menunggu',
        ]);
        Absen::create([
            'user_id' => 4,
            'kategori' => 'Hadir Telat',
            'alasan' => '-',
            'photo' => 'uhh.jpg',
            'long' => '107.659080',
            'lat' => '-6.967720',
            'status' => 'Menunggu',
        ]);
        Absen::create([
            'user_id' => 2,
            'kategori' => 'Sakit',
            'alasan' => 'Demam naik turun ahay',
            'photo' => 'glaze.png',
            'long' => '',
            'lat' => '',
            'status' => 'Menunggu',
        ]);
        Absen::create([
            'user_id' => 1,
            'kategori' => 'Izin',
            'alasan' => '-',
            'photo' => 'sigma.jpg',
            'long' => '107.659080',
            'lat' => '-6.967700',
            'status' => 'Menunggu',
        ]);
    }
}
