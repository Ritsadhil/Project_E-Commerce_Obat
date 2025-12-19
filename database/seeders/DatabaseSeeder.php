<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Medicine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat user admin
        User::firstOrCreate(
    ['email' => 'admin@gmail.com'],
    [
        'name' => 'Admin',
        'password' => bcrypt('password'),
        'role' => 'admin',
            ]
        );


        $catTablet = Category::firstOrCreate(
        ['slug' => 'tablet'],
        ['name' => 'Tablet']
        );

        Medicine::create([
            'name' => 'Antangin',
            'slug' => Str::slug('antangin'),
            'description' => 'Obat herbal untuk meredakan masuk angin dan meningkatkan stamina.',
            'image' => 'ANTANGIN.png',
            'price' => 4000,
            'stock' => 100,
            'category_id' => $catTablet->id,
            'dosis' => "1 - 5 tahun : 1 sachet 1 kali sehari
                        6 - 12 tahun : 1 sachet 1 - 2 kali sehari
                        13 - dewasa : 1 sachet 1 - 3 kali sehari",
            'peringatan' => "Hindari penggunaan penggunaan berlebihan dari dosis yang dianjurkan.
                            Simpan di tempat sejuk dan kering, jauh dari jangkauan anak-anak."
        ]);

        Medicine::create([
            'name' => 'Caviplex Tablet',
            'slug' => Str::slug('caviplex-tablet'),
            'description' => 'Suplemen multivitamin untuk anak-anak yang mendukung pertumbuhan dan daya tahan tubuh.',
            'image' => 'CAVIPLEX.png',
            'price' => 10000,
            'stock' => 50,
            'category_id' => $catTablet->id,
            'dosis' => "1 - 3 tahun : 1/2 tablet sehari
                        4 - 8 tahun : 1 tablet sehari
                        9 - 13 tahun : 1 - 2 tablet sehari",
            'peringatan' => "Hindari penggunaan berlebihan dari dosis yang dianjurkan.
                            Simpan di tempat sejuk dan kering, jauh dari jangkauan anak-anak."
        ]);

        Medicine::create([
            'name' => 'Paracetamol 500mg',
            'slug' => Str::slug('paracetamol-500mg'),
            'description' => 'Obat pereda nyeri dan penurun demam yang umum digunakan.',
            'image' => 'PARACETAMOL.png',
            'price' => 5000,
            'stock' => 200,
            'category_id' => $catTablet->id,
            'dosis' => "1 - 5 tahun : 1/2 tablet 3-4 kali sehari
                        6 - 12 tahun : 1 tablet 3-4 kali sehari
                        13 - dewasa : 1-2 tablet 3-4 kali sehari",
            'peringatan' => "Hati-hati penggunaan pada penderita gangguan hati.
                            Jangan melebihi dosis yang dianjurkan."
        ]); 

        Medicine::create([
            'name' => 'Bodrex Extra',
            'slug' => Str::slug('bodrex-extra'),
            'description' => 'Obat pereda sakit kepala yang mengandung kombinasi parasetamol dan kafein.',
            'image' => 'BODREX.png',
            'price' => 5000,
            'stock' => 150,
            'category_id' => $catTablet->id,
            'dosis' => "1 - 5 tahun : Tidak dianjurkan
                        6 - 12 tahun : 1/2 tablet 3 kali sehari
                        13 - dewasa : 1-2 tablet 3 kali sehari",
            'peringatan' => "Hindari penggunaan berlebihan dari dosis yang dianjurkan.
                            Jangan digunakan pada penderita gangguan jantung atau hipertensi."
        ]); 

        
    }
}
