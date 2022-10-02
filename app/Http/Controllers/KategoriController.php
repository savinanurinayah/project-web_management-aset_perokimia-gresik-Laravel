<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        if($q) {
            $kategori = KategoriModel::where(['aktif' => 'y'])
            ->where('nama', 'like', '%'. strtolower($q) .'%')->get();
        } else {
            $kategori = KategoriModel::where(['aktif' => 'y'])->get();
        }
        return view('index', [
            'page' => 'kategori.kategori',
            'kategoris' => $kategori
        ]);
    }

    public function tambah()
    {
        return view('index', [
            'page' => 'kategori.tambah-kategori'
        ]);
    }

    public function post_tambah(Request $request)
    {
        KategoriModel::create([
            'nama' => $request->nama,
            'created_at' => date('Y-m-d H:m:s'),
        ]);
        return redirect()->route('kategori.kategori')->with('success', 'kategori berhasil ditambah');
    }

    public function edit($id)
    {
        $kategori = KategoriModel::where(['id_kategori' => $id])->first();
        return view('index', [
            'page' => 'kategori.edit-kategori',
            'kategori' => $kategori
        ]);
    }

    public function post_edit($id, Request $request)
    {
        $kategori = KategoriModel::find($id);
        if(!$kategori) {
            return back()->withInput()->with('error', 'Kategori tidak ditemukan!');
        }
        $data_kategori = [
            'nama' => $request->nama,
            'updated_at' => date('Y-m-d H:m:s'),
        ];
        $kategori->where(['id_kategori' => $id])->update($data_kategori);
        return redirect()->route('kategori.kategori')->with('success', 'kategori berhasil diedit');

    }

    public function delete($id, Request $request)
    {
        $kategori = KategoriModel::find($id);
        if(!$kategori) {
            return back()->withInput()->with('error', 'Kategori tidak ditemukan!');
        }
        $kategori->where(['id_kategori' => $id])->update(['aktif' => 't']);
        return redirect()->route('kategori.kategori');
    }
}
