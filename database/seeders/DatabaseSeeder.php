<?php

use Illuminate\Database\Seeder;
use Database\Seeders\BidangSeeder;
use Database\Seeders\DummyUserSeeder;
use Database\Seeders\LayananSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            BidangSeeder::class,
            LayananSeeder::class,
            DummyUserSeeder::class,
        ]);
    }
}
