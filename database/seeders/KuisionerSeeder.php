<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kuisioner;

class KuisionerSeeder extends Seeder
{
    public function run()
    {
        $pertanyaan = [
            'Bagaimana penilaian Anda terhadap kebersihan fasilitas?',
            'Bagaimana penilaian Anda terhadap keramahan staf?',
            'Bagaimana penilaian Anda terhadap kecepatan layanan?',
            'Bagaimana penilaian Anda terhadap kenyamanan fasilitas?',
            'Bagaimana penilaian Anda terhadap kualitas makanan?',
        ];

        foreach ($pertanyaan as $p) {
            Kuisioner::create(['pertanyaan' => $p]);
        }
    }
}
