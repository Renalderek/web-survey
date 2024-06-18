<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Bidang;
use App\Models\Layanan;
use App\Models\Kuisioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $userCount = User::count(); // Menghitung jumlah user yang telah mengisi survey
        return view('admin.dashboard', compact('userCount'));
    }
}
