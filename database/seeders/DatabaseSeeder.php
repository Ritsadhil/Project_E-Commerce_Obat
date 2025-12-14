<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Medicine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat Akun Admin
        User::create([
            'Name' => 'Super Admin',
            'Email_Address' => 'admin@apotek.com',
            'Password' => Hash::make('password123'), // Password aman
            'role' => 'admin',
        ]);

        // 2. Buat 5 Kategori Berbeda
        $catTablet = Category::create(['Category' => 'Tablet']);
        $catSirup = Category::create(['Category' => 'Sirup']);
        $catKapsul = Category::create(['Category' => 'Kapsul']);
        $catSalep = Category::create(['Category' => 'Salep Kulit']);
        $catTetes = Category::create(['Category' => 'Obat Tetes']);

        // 3. Buat 5 Supplier Berbeda (Perusahaan Farmasi Asli Indonesia)
        $supKF = Supplier::create([
            'Supplier_Name' => 'PT Kimia Farma Tbk',
            'Supplier_Address' => 'Jl. Veteran No. 9, Jakarta Pusat',
            'contact' => '021-3847709'
        ]);

        $supKalbe = Supplier::create([
            'Supplier_Name' => 'PT Kalbe Farma Tbk',
            'Supplier_Address' => 'Jl. Letjen Suprapto Kav 4, Jakarta Pusat',
            'contact' => '021-42873888'
        ]);

        $supSanbe = Supplier::create([
            'Supplier_Name' => 'PT Sanbe Farma',
            'Supplier_Address' => 'Jl. Taman Sari No. 10, Bandung',
            'contact' => '022-4207725'
        ]);

        $supKonimex = Supplier::create([
            'Supplier_Name' => 'PT Konimex',
            'Supplier_Address' => 'Desa Sanggrahan, Grogol, Sukoharjo',
            'contact' => '0271-715333'
        ]);

        $supDexa = Supplier::create([
            'Supplier_Name' => 'PT Dexa Medica',
            'Supplier_Address' => 'Titan Center, Bintaro Jaya Sektor 7, Tangerang',
            'contact' => '021-7454111'
        ]);

        // 4. Buat 5 Obat (1 Obat mewakili 1 Kategori & 1 Supplier unik)

        // Obat 1: Paracetamol (Tablet - Kimia Farma)
        Medicine::create([
            'Medicine_Name' => 'Paracetamol 500mg',
            'Image' => null, // Bisa diisi url gambar nanti
            'Price' => 5000,
            'Stock' => 100,
            'Description' => 'Obat penurun panas dan pereda nyeri ringan seperti sakit kepala dan sakit gigi.',
            'category_id' => $catTablet->id,
            'supplier_id' => $supKF->id,
        ]);

        // Obat 2: Bioplacenton (Salep - Kalbe Farma)
        Medicine::create([
            'Medicine_Name' => 'Bioplacenton Gel 15gr',
            'Image' => null,
            'Price' => 25000,
            'Stock' => 50,
            'Description' => 'Gel untuk mengobati luka bakar, luka infeksi, dan mempercepat proses penyembuhan luka.',
            'category_id' => $catSalep->id,
            'supplier_id' => $supKalbe->id,
        ]);

        // Obat 3: Amoxsan (Kapsul - Sanbe Farma)
        Medicine::create([
            'Medicine_Name' => 'Amoxsan 500mg',
            'Image' => null,
            'Price' => 45000,
            'Stock' => 30,
            'Description' => 'Antibiotik amoxicillin untuk mengobati berbagai infeksi bakteri.',
            'category_id' => $catKapsul->id,
            'supplier_id' => $supSanbe->id,
        ]);

        // Obat 4: Termorex (Sirup - Konimex)
        Medicine::create([
            'Medicine_Name' => 'Termorex Sirup 60ml',
            'Image' => null,
            'Price' => 12000,
            'Stock' => 75,
            'Description' => 'Sirup penurun panas anak dengan rasa jeruk, bebas alkohol.',
            'category_id' => $catSirup->id,
            'supplier_id' => $supKonimex->id,
        ]);

        // Obat 5: Cendo Xitrol (Tetes Mata - Kita pinjam Dexa Medica sebagai distributor contoh)
        Medicine::create([
            'Medicine_Name' => 'Cendo Xitrol 5ml',
            'Image' => null,
            'Price' => 32000,
            'Stock' => 20,
            'Description' => 'Obat tetes mata steril untuk mengatasi infeksi bakteri dan radang pada mata.',
            'category_id' => $catTetes->id,
            'supplier_id' => $supDexa->id,
        ]);
    }
}
