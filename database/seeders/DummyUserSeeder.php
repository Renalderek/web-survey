<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminData = [
            [
                'username' => 'ADMIN',
                'password' => bcrypt('12345')
            ]
        ];
        foreach ($adminData as $key => $val) {
            Admin::create($val);
        }
    }
}
