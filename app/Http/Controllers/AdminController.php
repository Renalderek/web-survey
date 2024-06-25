<?php

namespace App\Http\Controllers;

use Log;
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

    public function show($id)
    {
        $bidang = Bidang::find($id);
        return view('admin.bidang.show', compact('bidang'));
    }
    public function editBidang($id)
    {
        $bidang = Bidang::findOrFail($id);
        return view('admin.bidang.edit', compact('bidang'));
    }

    public function updateBidang(Request $request, $id)
    {
        $bidang = Bidang::findOrFail($id);
        $bidang->nama_bidang = $request->input('nama_bidang');
        $bidang->save();
        return redirect()->route('admin.bidang')->with('success', 'Bidang berhasil diupdate.');
    }
    public function destroyBidang($id)
    {
        try {
            $bidang = Bidang::findOrFail($id);
            $bidang->delete();
            return redirect()->route('admin.bidang')->with('success', 'Bidang berhasil dihapus.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Log pesan error untuk debugging
            Log::error('Item not found for ID ' . $id);

            // Redirect atau kirim respons jika item tidak ditemukan
            return redirect()->route('items.index')->with('error', 'Item tidak ditemukan.');
        }
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
        return view('admin.layanan.edit', compact('layanan', 'bidangs'));
    }

    public function updateLayanan(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->update($request->all());
        return redirect()->route('admin.layanan')->with('success', 'Layanan berhasil diupdate.');
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
        return view('admin.kuisioner.edit', compact('kuisioner'));
    }

    public function updateKuisioner(Request $request, $id)
    {
        $kuisioner = Kuisioner::findOrFail($id);
        $kuisioner->update($request->all());
        return redirect()->route('admin.kuisioner')->with('success', 'Pertanyaan kuisioner berhasil diupdate.');
    }
    public function destroyKuisioner($id)
    {
        $kuisioner = Kuisioner::findOrFail($id);
        $kuisioner->delete();
        return redirect()->route('admin.kuisioner')->with('success', 'Pertanyaan kuisioner berhasil dihapus.');
    }
}
