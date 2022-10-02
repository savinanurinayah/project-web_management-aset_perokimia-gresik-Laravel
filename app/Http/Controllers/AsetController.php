<?php

namespace App\Http\Controllers;

use App\Models\AsetModel;
use App\Models\LokasiModel;
use App\Models\PegawaiModel;
use Illuminate\Http\Request;
use App\Models\KategoriModel;

class AsetController extends Controller
{
    public function index(Request $request)
    {
        $lokasi = $request->get('lokasi');
        $q = $request->get('q');

        if($lokasi){
            $asset = AsetModel::
            join('tbl_kategori_aset', 'tbl_kategori_aset.id_kategori', '=', 'tbl_aset.id_kategori')
            ->join('tbl_lokasi_aset', 'tbl_lokasi_aset.id_lokasi', '=', 'tbl_aset.id_lokasi')
            ->select('tbl_aset.*', 'tbl_kategori_aset.nama as nama_kategori')
            ->where(['tbl_aset.aktif' => 'y', 'tbl_aset.id_lokasi' => $lokasi])->get();
        }elseif ($q) {
            $asset = AsetModel::
            join('tbl_kategori_aset', 'tbl_kategori_aset.id_kategori', '=', 'tbl_aset.id_kategori')
            ->join('tbl_lokasi_aset', 'tbl_lokasi_aset.id_lokasi', '=', 'tbl_aset.id_lokasi')
            ->select('tbl_aset.*', 'tbl_kategori_aset.nama as nama_kategori')
            ->where('nama_aset', 'like', '%'. strtolower($q). '%')
            ->where(['tbl_aset.aktif' => 'y'])->get();
        }else {
            $asset = AsetModel::
            join('tbl_kategori_aset', 'tbl_kategori_aset.id_kategori', '=', 'tbl_aset.id_kategori')
            ->join('tbl_lokasi_aset', 'tbl_lokasi_aset.id_lokasi', '=', 'tbl_aset.id_lokasi')
            ->select('tbl_aset.*', 'tbl_kategori_aset.nama as nama_kategori')
            ->where(['tbl_aset.aktif' => 'y'])->get();
        }
        return view('index', [
            'page' => 'aset.aset',
            'asets' => $asset
        ]);
    }

    public function tambah()
    {
        return view('index',[
            'page' => 'aset.tambah-aset',
            'kategoris' => KategoriModel::where(['aktif' => 'y'])->get(),
            'pegawais' => PegawaiModel::where(['aktif' => 'y'])->get(),
            'lokasis' => LokasiModel::where(['aktif' => 'y'])->get(),
            'kondisis' => ['Baik', 'Kurang Baik', 'Rusak'],
        ]);
    }

    public function post_tambah(Request $request)
    {
        $gambar = null;
        if($request->file('gambar')) {
            $gambar_extension = $request->file('gambar')->extension();
            if(in_array($gambar_extension, array('jpg','jpeg','png','gif')) == false) {
                return back()->withInput()->with('error', 'Type gambar yang diijinkan jpg,jpeg,png,gif!');
            }
            $gambar = $request->file('gambar')->store('public/gambar_aset');
            $gambar = str_replace('public/', '', $gambar);
        }

        AsetModel::create([
            'kode' => $request->kode,
            'nama_aset' => $request->nama,
            'id_kategori' => $request->id_kategori,
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'nilai_aset' => $request->nilai_aset,
            'id_lokasi' => $request->lokasi_aset,
            'detail_aset' => $request->detail_aset,
            'kondisi' => $request->kondisi,
            'nip_pegawai' => session('userdata')->nip_pegawai,
            'gambar' => ($gambar) ? $gambar : null,
            'created_at' => date('Y-m-d H:m:s'),
        ]);
        return redirect()->route('aset.aset')->with('success', 'aset berhasil ditambah');

    }

    public function edit($id)
    {
        $aset = AsetModel::where(['id_aset' => $id])
        ->join('tbl_kategori_aset', 'tbl_kategori_aset.id_kategori', '=', 'tbl_aset.id_kategori')
        ->join('tbl_lokasi_aset', 'tbl_lokasi_aset.id_lokasi', '=', 'tbl_aset.id_lokasi')
        ->select('tbl_aset.*', 'tbl_kategori_aset.nama as nama_kategori')->first();
        return view('index', [
            'page' => 'aset.edit-aset',
            'kategoris' => KategoriModel::where(['aktif' => 'y'])->get(),
            'pegawais' => PegawaiModel::where(['aktif' => 'y'])->get(),
            'lokasis' => LokasiModel::where(['aktif' => 'y'])->get(),
            'kondisis' => ['Baik', 'Kurang Baik', 'Rusak'],
            'aset' => $aset
        ]);
    }

    public function post_edit($id, Request $request)
    {
        $aset = AsetModel::find($id);
        if(!$aset) {
            return back()->withInput()->with('error', 'Aset tidak ditemukan!');
        }
        $gambar = null;
        if($request->file('gambar')) {
            $gambar_extension = $request->file('gambar')->extension();
            if(in_array($gambar_extension, array('jpg','jpeg','png','gif')) == false) {
                return back()->withInput()->with('error', 'Type gambar yang diijinkan jpg,jpeg,png,gif!');
            }
            $gambar = $request->file('gambar')->store('public/gambar_aset');
            $gambar = str_replace('public/', '', $gambar);
        }

        $data_aset = [
            'kode' => $request->kode,
            'nama_aset' => $request->nama,
            'id_kategori' => $request->id_kategori,
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'nilai_aset' => $request->nilai_aset,
            'id_lokasi' => $request->lokasi_aset,
            'detail_aset' => $request->detail_aset,
            'kondisi' => $request->kondisi,
            'nip_pegawai' => session('userdata')->nip_pegawai,
            'updated_at' => date('Y-m-d H:m:s'),
        ];
        if($gambar)
            $data_aset['gambar'] = $gambar;

        $aset->where(['id_aset' => $id])->update($data_aset);
        return redirect()->route('aset.aset')->with('success', 'aset berhasil diedit');

    }

    public function delete($id, Request $request)
    {
        $aset = AsetModel::find($id);
        if(!$aset) {
            return back()->withInput()->with('error', 'Aset tidak ditemukan!');
        }
        $aset->where(['id_aset' => $id])->update(['aktif' => 't']);
        return redirect()->route('aset.aset');
    }
}
