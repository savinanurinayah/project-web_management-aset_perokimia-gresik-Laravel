<?php

namespace App\Http\Controllers;

use App\Models\LokasiModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LokasiController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        if($q) {
            $lokasi = LokasiModel::where(['aktif' => 'y'])
            ->where('nama', 'like', '%' . strtolower($q) . '%')->get();
        } else {
            $lokasi = LokasiModel::where(['aktif' => 'y'])->get();
        }
        return view('index', [
            'page' => 'lokasi.lokasi',
            'lokasis' => $lokasi
        ]);
    }

    public function tambah()
    {
        return view('index', [
            'page' => 'lokasi.tambah-lokasi'
        ]);
    }

    public function post_tambah(Request $request)
    {
        LokasiModel::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'created_at' => date('Y-m-d H:m:s'),
        ]);
        return redirect()->route('lokasi.lokasi')->with('success', 'lokasi berhasil ditambah');
    }

    public function edit($id)
    {
        $lokasi = LokasiModel::where(['id_lokasi' => $id])->first();
        return view('index', [
            'page' => 'lokasi.edit-lokasi',
            'lokasi' => $lokasi
        ]);
    }

    public function post_edit($id, Request $request)
    {
        $lokasi = LokasiModel::find($id);
        if(!$lokasi) {
            return back()->withInput()->with('error', 'Lokasi tidak ditemukan!');
        }
        $data_lokasi = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'updated_at' => date('Y-m-d H:m:s'),
        ];
        $lokasi->where(['id_lokasi' => $id])->update($data_lokasi);
        return redirect()->route('lokasi.lokasi')->with('success', 'departemen berhasil diedit');

    }

    public function delete($id, Request $request)
    {
        $lokasi = LokasiModel::find($id);
        if(!$lokasi) {
            return back()->withInput()->with('error', 'Lokasi tidak ditemukan!');
        }
        $lokasi->where(['id_lokasi' => $id])->update(['aktif' => 't']);
        return redirect()->route('lokasi.lokasi');

    }
}
