<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bidang;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
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
}
