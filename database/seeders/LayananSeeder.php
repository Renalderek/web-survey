<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananSeeder extends Seeder
{
    public function run()
    {
        DB::table('layanans')->insert([
            ['bidang_id' => 1, 'nama_layanan' => 'Layanan Konseling'],
            ['bidang_id' => 1, 'nama_layanan' => 'Layanan Perpustakaan'],
            ['bidang_id' => 2, 'nama_layanan' => 'Layanan Medis'],
            ['bidang_id' => 2, 'nama_layanan' => 'Layanan Kesehatan Mental'],
            ['bidang_id' => 3, 'nama_layanan' => 'Layanan IT Support'],
            ['bidang_id' => 3, 'nama_layanan' => 'Layanan Pengembangan Software'],
        ]);
    }
}
