<?php

namespace App\Http\Controllers;

use App\Models\DepartemenModel;
use App\Models\PegawaiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        $nip = $request->get('nip');
        $q = $request->get('q');
        if($nip && $q) {
            $pegawai = PegawaiModel::where(['tbl_pegawai.aktif' => 'y'])
            ->where('nama_pegawai', 'like', '%' . strtolower($q) . '%')
            ->where('nip_pegawai', 'like', '%' . strtolower($nip) . '%')
            ->join('tbl_departemen', 'tbl_departemen.id_departemen', '=', 'tbl_pegawai.id_departemen')
            ->select('tbl_pegawai.*', 'tbl_departemen.nama as departemen')->get();
        } else if ($nip) {
            $pegawai = PegawaiModel::where(['tbl_pegawai.aktif' => 'y'])
            ->where('nip_pegawai', 'like', '%' . strtolower($nip) . '%')
            ->join('tbl_departemen', 'tbl_departemen.id_departemen', '=', 'tbl_pegawai.id_departemen')
            ->select('tbl_pegawai.*', 'tbl_departemen.nama as departemen')->get();
        } else if ($q) {
            $pegawai = PegawaiModel::where(['tbl_pegawai.aktif' => 'y'])
            ->where('nama_pegawai', 'like', '%' . strtolower($q) . '%')
            ->join('tbl_departemen', 'tbl_departemen.id_departemen', '=', 'tbl_pegawai.id_departemen')
            ->select('tbl_pegawai.*', 'tbl_departemen.nama as departemen')->get();
        } else {
            $pegawai = PegawaiModel::where(['tbl_pegawai.aktif' => 'y'])
            ->join('tbl_departemen', 'tbl_departemen.id_departemen', '=', 'tbl_pegawai.id_departemen')
            ->select('tbl_pegawai.*', 'tbl_departemen.nama as departemen')->get();
        }
        return view('index', [
            'page' => 'pegawai.pegawai',
            'pegawais' => $pegawai
        ]);
    }

    public function tambah()
    {
        return view('index', [
            'page' => 'pegawai.tambah-pegawai',
            'departemens' => DepartemenModel::all()
        ]);
    }

    public function post_tambah(Request $request)
    {
        $pegawai = PegawaiModel::where(['nip_pegawai' => $request->nip_pegawai])->first();
        if($pegawai) {
            return back()->withInput()->with('error', 'NIP sudah terpakai oleh pegawai '.$pegawai->nama_pegawai.'!');
        }
        PegawaiModel::create([
            'nip_pegawai' => $request->nip_pegawai,
            'nama_pegawai' => $request->nama_pegawai,
            'no_telepon' => $request->no_telepon,
            'jenis_kelamin' => $request->jk,
            'id_departemen' => $request->departemen,
            'status' => $request->status,
            'username' => strtolower($request->username),
            'password' => Hash::make($request->password),
            'created_at' => date('Y-m-d H:m:s'),
        ]);
        return redirect()->route('pegawai.pegawai')->with('success', 'pegawai berhasil ditambah');
    }

    public function edit($id)
    {
        $pegawai = PegawaiModel::where(['nip_pegawai' => $id])->first();
        return view('index', [
            'page' => 'pegawai.edit-pegawai',
            'pegawai' => $pegawai,
            'departemens' => DepartemenModel::all()
        ]);
    }

    public function post_edit($id, Request $request)
    {
        $pegawai = PegawaiModel::find($id);

        if(!$pegawai) {
            return back()->withInput()->with('error', 'Pegawai tidak ditemukan!');
        }
        $data_pegawai = [
            'nama_pegawai' => $request->nama_pegawai,
            'no_telepon' => $request->no_telepon,
            'jenis_kelamin' => $request->jk,
            'id_departemen' => $request->departemen,
            'status' => (session('userdata')['status'] == 'ADMIN') ? $request->status : 'USER',
            'updated_at' => date('Y-m-d H:m:s'),
        ];

        if($request->password) {
            $data_pegawai['password'] = Hash::make($request->password);
        }
        $pegawai->where(['nip_pegawai' => $id])->update($data_pegawai);
        return redirect()->route('pegawai.pegawai')->with('success', 'pegawai berhasil diedit');
    }

    public function delete($id, Request $request)
    {
        $pegawai = PegawaiModel::find($id);
        if(!$pegawai) {
            return back()->withInput()->with('error', 'Pegawai tidak ditemukan!');
        }
        $pegawai->where(['nip_pegawai' => $id])->update(['aktif' => 't']);
        return redirect()->route('pegawai.pegawai');
    }
}
