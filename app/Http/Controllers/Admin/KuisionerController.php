<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kuisioner;
use Illuminate\Http\Request;

class KuisionerController extends Controller
{
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
            'pertanyaan' => 'required|string|max:255',
        ]);

        $kuisioner = Kuisioner::findOrFail($id);
        $kuisioner->pertanyaan = $request->pertanyaan;
        $kuisioner->save();
        return redirect()->route('admin.kuisioner')->with('success', 'Pertanyaan kuisioner berhasil diperbaharui.');
    }

    public function destroyKuisioner($id)
    {
        $kuisioner = Kuisioner::findOrFail($id);
        $kuisioner->delete();
        return redirect()->route('admin.kuisioner')->with('success', 'Pertanyaan kuisioner berhasil dihapus.');
    }
}
