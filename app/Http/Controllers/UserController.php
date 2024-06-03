<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Layanan;
use App\Models\Kuisioner;
use App\Models\User;
use App\Models\JawabanKuisioner;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showBiodataForm()
    {
        return view('user.biodata');
    }

    public function submitBiodata(Request $request)
    {
        $user = User::create($request->all());
        session(['user_id' => $user->id]);
        return redirect()->route('user.bidang');
    }

    public function showBidangForm()
    {
        $bidangs = Bidang::all();
        return view('user.bidang', compact('bidangs'));
    }

    public function submitBidang(Request $request)
    {
        session(['bidang_id' => $request->bidang_id]);
        return redirect()->route('user.layanan');
    }

    public function showLayananForm()
    {
        $layanan = Layanan::where('bidang_id', session('bidang_id'))->get();
        return view('user.layanan', compact('layanan'));
    }

    public function submitLayanan(Request $request)
    {
        session(['layanan_id' => $request->layanan_id]);
        return redirect()->route('user.kuisioner');
    }

    public function showKuisionerForm()
    {
        $kuisioners = Kuisioner::all();

        return view('user.kuisioner', compact('kuisioners'));
    }

    public function submitKuisioner(Request $request)
    {
        foreach ($request->jawaban as $kuisioner_id => $jawaban) {
            JawabanKuisioner::create([
                'user_id' => session('user_id'),
                'kuisioner_id' => $kuisioner_id,
                'jawaban' => $jawaban,
            ]);
        }
        return redirect()->route('home')->with('success', 'Terima kasih telah mengisi kuisioner.');
    }
}
