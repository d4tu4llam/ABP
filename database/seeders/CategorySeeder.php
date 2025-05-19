<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Mobil Baru',
                'description' => 'Kategori untuk mobil-mobil baru langsung dari dealer.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mobil Bekas',
                'description' => 'Kategori untuk mobil second yang masih layak pakai.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Aksesoris',
                'description' => 'Kategori untuk aksesoris dan suku cadang mobil.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
