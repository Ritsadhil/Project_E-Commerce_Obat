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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $catTablet = Category::create(['name' => 'Tablet']);
        $catSirup  = Category::create(['name' => 'Sirup']);
        $catSalep  = Category::create(['name' => 'Salep']);
        $catPil    = Category::create(['name' => 'Pil']);

        Medicine::create([
            'name' => 'Antangin Cair',
            'slug' => Str::slug('Antangin Cair'),
            'description' => 'Obat herbal masuk angin dalam bentuk cair sachet.',
            'image' => 'antangin.jpg',
            'price' => 4000,
            'stock' => 100,
            'category_id' => $catSirup->id,
        ]);

        Medicine::create([
            'name' => 'Caviplex Tablet',
            'slug' => Str::slug('Caviplex Tablet'),
            'description' => 'Multivitamin lengkap untuk daya tahan tubuh.',
            'image' => 'caviplex.jpg',
            'price' => 10000,
            'stock' => 50,
            'category_id' => $catTablet->id,
        ]);

        Medicine::create([
            'name' => 'Paracetamol 500mg',
            'slug' => Str::slug('Paracetamol 500mg'),
            'description' => 'Obat pereda nyeri dan penurun demam.',
            'image' => 'paracetamol.jpg',
            'price' => 5000,
            'stock' => 200,
            'category_id' => $catTablet->id,
        ]);

        Medicine::create([
            'name' => 'Bodrex Extra',
            'slug' => Str::slug('Bodrex Extra'),
            'description' => 'Obat sakit kepala mencengkram yang ampuh.',
            'image' => 'bodrex.jpg',
            'price' => 5000,
            'stock' => 80,
            'category_id' => $catTablet->id,
        ]);

        Medicine::create([
            'name' => 'Kalpanax Cream',
            'slug' => Str::slug('Kalpanax Cream'),
            'description' => 'Salep untuk mengatasi gatal jamur kulit.',
            'image' => 'kalpanax.jpg',
            'price' => 15000,
            'stock' => 25,
            'category_id' => $catSalep->id,
        ]);
    }
}
