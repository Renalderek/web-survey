<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bidang;
use Illuminate\Http\Request;

class BidangController extends Controller
{
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

    public function editBidang($id)
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
        return redirect()->route('admin.bidang')->with('success', 'Bidang berhasil diperbaharui.');
    }

    public function destroyBidang($id)
    {
        $bidang = Bidang::findOrFail($id);
        $bidang->delete();
        return redirect()->route('admin.bidang')->with('success', 'Bidang berhasil dihapus.');
    }
}
