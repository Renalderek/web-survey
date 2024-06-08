<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller

{
    function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(
            'username',
            'password'

        );

        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/admin');
        } else {
            return redirect()->back()->withErrors('username dan password yang dimasukkan tidak sesuai!')->withInput();
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
    

//     function login(Request $request)
//     {
//         $request->validate(
//             [
//                 'username' => 'required',
//                 'password' => 'required'
//             ],
//             [
//                 'username.required' => 'Username Wajib Diisi',
//                 'password.required' => 'Password Wajib Diisi'
//             ]
//         );
//         $infologin = [
//             'username' => $request->username,
//             'password' => $request->password,
//         ];

//         if (Auth::attempt($infologin)) {
//             echo "Sukses";
//             exit();
//         } else {
//             return redirect('')->withErrors('Username dan password yang dimasukan tidak sesuai!')->withInput();
//         }
//     }
// }
