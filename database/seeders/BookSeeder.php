<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title' => 'Laskar Pelangi',
            'author' => 'Andrea Hirata',
            'description' => 'Kisah inspiratif anak-anak Belitong dalam mengejar pendidikan.',
            'stock' => 5,
        ]);

        Book::create([
            'title' => 'Bumi Manusia',
            'author' => 'Pramoedya Ananta Toer',
            'description' => 'Perjalanan Minke di era kebangkitan nasional Indonesia.',
            'stock' => 3,
        ]);

        Book::create([
            'title' => 'Atomic Habits',
            'author' => 'James Clear',
            'description' => 'Cara mudah dan terbukti untuk membentuk kebiasaan baik dan menghilangkan kebiasaan buruk.',
            'stock' => 10,
        ]);
        
        Book::create([
            'title' => 'Pemrograman Laravel untuk Pemula',
            'author' => 'Tim Developer',
            'description' => 'Buku panduan lengkap menguasai framework Laravel 11 dari nol.',
            'stock' => 7,
        ]);
    }
}