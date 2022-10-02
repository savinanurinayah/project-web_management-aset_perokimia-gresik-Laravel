<?php

namespace App\Http\Controllers;

use App\Models\PegawaiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function check(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $pegawai = PegawaiModel::where(['username' => $username,'aktif' => 'y'])->first();
        if(!$pegawai) {
            return back()->withInput()->with('error', 'Silahkan cek username atau password anda!');
        }
        if (!Hash::check($password, $pegawai->password)) {
            return back()->withInput()->with('error', 'Password Salah!');
        }
        session(['userdata' => $pegawai, 'logged_in' => true]);
        return redirect('/');
    }

    public function logout(Request $request)
    {
        session()->flush();
        return redirect('/login');
    }
}
