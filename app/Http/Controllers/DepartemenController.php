<?php

namespace App\Http\Controllers;

use App\Models\DepartemenModel;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        if($q) {
            $departemen = DepartemenModel::where(['aktif' => 'y'])
            ->where('nama', 'like', '%'.strtolower($q).'%')->get();
        } else {
            $departemen = DepartemenModel::where(['aktif' => 'y'])->get();
        }
        return view('index', [
            'page' => 'departemen.departemen',
            'departemens' => $departemen
        ]);
    }

    public function tambah()
    {
        return view('index', [
            'page' => 'departemen.tambah-departemen'
        ]);
    }

    public function post_tambah(Request $request)
    {
        DepartemenModel::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'created_at' => date('Y-m-d H:m:s'),
        ]);
        return redirect()->route('departemen.departemen')->with('success', 'departemen berhasil ditambah');

    }

    public function edit($id)
    {
        $departemen = DepartemenModel::where(['id_departemen' => $id])->first();
        return view('index', [
            'page' => 'departemen.edit-departemen',
            'departemen' => $departemen
        ]);
    }

    public function post_edit($id, Request $request)
    {
        $departemen = DepartemenModel::find($id);
        if(!$departemen) {
            return back()->withInput()->with('error', 'Departemen tidak ditemukan!');
        }
        $data_departemen = [
            'nama' => $request->nama,
            'kode' => $request->kode,
            'updated_at' => date('Y-m-d H:m:s'),
        ];
        $departemen->where(['id_departemen' => $id])->update($data_departemen);
        return redirect()->route('departemen.departemen')->with('success', 'departemen berhasil diedit');

    }

    public function delete($id, Request $request)
    {
        $departemen = DepartemenModel::find($id);
        if(!$departemen) {
            return back()->withInput()->with('error', 'Departemen tidak ditemukan!');
        }
        $departemen->where(['id_departemen' => $id])->update(['aktif' => 't']);
        return redirect()->route('departemen.departemen');
    }
}
