<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bidang;
use App\Models\Layanan;
use App\Models\Kuisioner;

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

        Bidang::create(['nama_bidang' => $request->nama_bidang]);

        return redirect()->route('admin.bidang')->with('success', 'Bidang berhasil ditambahkan.');
    }

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
            'nama_bidang' => 'required|string|max:255',
        ]);

        Layanan::create($request->all());

        return redirect()->route('admin.layanan')->with('success', 'Layanan berhasil ditambahkan.');
    }

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
}
