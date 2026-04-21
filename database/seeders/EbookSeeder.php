<?php

namespace Database\Seeders;

use App\Models\Ebook;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EbookSeeder extends Seeder
{
    public function run(): void
    {
        $ebooks = [
            [
                'title' => 'Struktur Baja I',
                'author' => 'M. Yedi, Erlina Yanuarini, S.T., M.T.',
                'cover' => 'assets/image/ebook-baja1.png',
                'description' => 'Materi dasar struktur baja untuk mahasiswa dan praktisi teknik sipil.',
                'price' => 100000,
                'is_popular' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Struktur Baja II',
                'author' => 'M. Yedi, Erlina Yanuarini, S.T., M.T.',
                'cover' => 'assets/image/ebook-baja1.png',
                'description' => 'Pembahasan lanjutan struktur baja.',
                'price' => 100000,
                'is_popular' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Beton Bertulang Dasar',
                'author' => 'Tim Sipilsaku',
                'cover' => 'assets/image/ebook-baja1.png',
                'description' => 'Dasar perencanaan elemen beton bertulang.',
                'price' => 100000,
                'is_popular' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Mekanika Tanah',
                'author' => 'Tim Sipilsaku',
                'cover' => 'assets/image/ebook-baja1.png',
                'description' => 'Konsep dasar mekanika tanah.',
                'price' => 100000,
                'is_popular' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Manajemen Konstruksi',
                'author' => 'Tim Sipilsaku',
                'cover' => 'assets/image/ebook-baja1.png',
                'description' => 'Materi pengantar manajemen proyek konstruksi.',
                'price' => 100000,
                'is_popular' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Dasar SAP2000',
                'author' => 'Tim Sipilsaku',
                'cover' => 'assets/image/ebook-baja1.png',
                'description' => 'Panduan awal penggunaan SAP2000.',
                'price' => 100000,
                'is_popular' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Perancangan Jalan',
                'author' => 'Tim Sipilsaku',
                'cover' => 'assets/image/ebook-baja1.png',
                'description' => 'Dasar perancangan geometrik jalan.',
                'price' => 100000,
                'is_popular' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Estimasi Biaya Proyek',
                'author' => 'Tim Sipilsaku',
                'cover' => 'assets/image/ebook-baja1.png',
                'description' => 'Perhitungan dasar estimasi biaya proyek.',
                'price' => 100000,
                'is_popular' => false,
                'is_active' => true,
            ],
        ];

        foreach ($ebooks as $ebook) {
            Ebook::create([
                ...$ebook,
                'slug' => Str::slug($ebook['title']),
            ]);
        }
    }
}