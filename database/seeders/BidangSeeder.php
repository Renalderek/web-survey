<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidangSeeder extends Seeder
{
    public function run()
    {
        DB::table('bidangs')->insert([
            ['nama_bidang' => 'Bidang Pendidikan'],
            ['nama_bidang' => 'Bidang Kesehatan'],
            ['nama_bidang' => 'Bidang Teknologi'],
        ]);
    }
}
