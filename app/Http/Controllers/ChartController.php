<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JawabanKuisioner;

class ChartController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel jawaban_kuisioner
        $jawabanKuisioner = JawabanKuisioner::all();

        // Mengelompokkan data berdasarkan jawaban dan menghitung jumlah kemunculan setiap jawaban
        $jawabanCount = $jawabanKuisioner->groupBy('jawaban')->map(function ($item) {
            return $item->count();
        });

        // Mengelompokkan data berdasarkan user_id dan menghitung jumlah jawaban setiap pengguna
        $userJawabanCount = $jawabanKuisioner->groupBy('user_id')->map(function ($item) {
            return $item->count();
        });

        return view('admin.grafik', [
            'jawabanData' => $jawabanCount,
            'userJawabanData' => $userJawabanCount
        ]);
    }
}