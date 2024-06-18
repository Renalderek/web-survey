<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Bidang;
use App\Models\Layanan;
use App\Models\Kuisioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // bidang controller
    public function showBidangForm()
    {
        $bidangs = Bidang::all();
        return view('admin.bidang', compact('bidangs'));
    }

    public function storeBidang(Request $request)
    {
        $request->validate([
            'nama_bidang' => 'required|string|max:255',
        ]);

        Bidang::create($request->all());

        return redirect()->route('admin.bidang')->with('success', 'Bidang berhasil ditambahkan.');
    }

    public function edit_Bidang($id)
    {
            $bidang = Bidang::findOrFail($id);
            return view('admin.edit_bidang', compact('bidang'));
      
    }

    public function updateBidang(Request $request, $id)
    {
        $request->validate([
            'nama_bidang' => 'required|string|max:255',
        ]);
    
        $bidang = Bidang::findOrFail($id);
        $bidang->nama_bidang = $request->nama_bidang;
        $bidang->save();
        return redirect()->route('admin.bidang')->with('success', 'Bidang berhasil di perbaharui.');
    }
    public function destroy_Bidang($id)
    {
        $bidang = Bidang::findOrFail($id);
        $bidang->delete();
        return redirect()->route('admin.bidang')->with('success', 'Pertanyaan kuisioner berhasil dihapus.');
    }

    // controller bidang berakhir 

    // controller layanan mulai
    public function showLayananForm()
    {
        $bidangs = Bidang::all();
        $layanans = Layanan::with('bidang')->get();
        return view('admin.layanan', compact('bidangs', 'layanans'));
    }


    public function storeLayanan(Request $request)
    {
        $request->validate([
            'bidang_id' => 'required|exists:bidangs,id',
            'nama_layanan' => 'required|string|max:255',
        ]);

        Layanan::create($request->all());

        return redirect()->route('admin.layanan')->with('success', 'Layanan berhasil ditambahkan.');
    }
    public function editLayanan($id)
    {
        $layanan = Layanan::findOrFail($id);
        $bidangs = Bidang::all();
        return view('admin.edit_layanan', compact('layanan', 'bidangs'));
    }

    public function updateLayanan(Request $request, $id)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
        ]);
    
        $layanan = Layanan::findOrFail($id);
        $layanan->nama_layanan = $request->nama_layanan;
        $layanan->save();
        return redirect()->route('admin.layanan')->with('success', 'Layanan berhasil diperbaharui.');
    }
    public function destroyLayanan($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();
        return redirect()->route('admin.layanan')->with('success', 'Layanan berhasil dihapus.');
    }

    // controller layanan berakhir

    // controller kuisioner mulai
    public function showKuisionerForm()
    {
        $kuisioners = Kuisioner::all();
        return view('admin.kuisioner', compact('kuisioners'));
    }

    public function storeKuisioner(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
        ]);

        Kuisioner::create(['pertanyaan' => $request->pertanyaan]);

        return redirect()->route('admin.kuisioner')->with('success', 'Pertanyaan berhasil ditambahkan.');
    }
    public function editKuisioner($id)
    {
        $kuisioner = Kuisioner::findOrFail($id);
        return view('admin.edit_kuisioner', compact('kuisioner'));
    }

    public function updateKuisioner(Request $request, $id)
    {
        $request->validate([
            'nama_kuisioner' => 'required|string|max:255',
        ]);
    
        $kuisioner = Kuisioner::findOrFail($id);
        $kuisioner->nama_kuisioner = $request->nama_kuisioner;
        $kuisioner->save();
        return redirect()->route('admin.index')->with('success', 'Pertanyaan kuisioner berhasil diperbaharui.');
    }
    public function destroyKuisioner($id)
    {
        $kuisioner = Kuisioner::findOrFail($id);
        $kuisioner->delete();
        return redirect()->route('admin.kuisioner')->with('success', 'Pertanyaan kuisioner berhasil dihapus.');
    }
    // controller kuisioner berakhir


    //     public function showGrafik()
    //     {
    //         $jawabanData = JawabanKuisioner::select('jawaban', DB::raw('count(*) as total'))
    //             ->groupBy('jawaban')
    //             ->get();

    //         return view('admin.grafik', compact('jawabanData'));
    //     }
}
