<?php

namespace App\Http\Controllers;

use App\Models\AsetModel;
use App\Models\PegawaiModel;
use Illuminate\Http\Request;
use App\Models\DepartemenModel;
use App\Models\PeminjamanModel;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $page = 'dashboard';
        if(session('userdata')['status'] != 'ADMIN') {
            $id_pegawai = session('userdata')['nip_pegawai'];
            $page = 'peminjaman.peminjaman-pegawai';
            $asets = AsetModel::
            join('tbl_kategori_aset', 'tbl_kategori_aset.id_kategori', '=', 'tbl_aset.id_kategori')
            ->join('tbl_peminjaman', 'tbl_peminjaman.id_aset', '=', 'tbl_aset.id_aset')
            ->select('tbl_aset.*', 'tbl_kategori_aset.nama as nama_kategori', 'tbl_peminjaman.id as id_peminjaman','tbl_peminjaman.tanggal_peminjaman', 'tbl_peminjaman.tanggal_pengembalian', 'tbl_peminjaman.keperluan', 'tbl_peminjaman.status as status_peminjaman')
            ->where(['tbl_aset.aktif' => 'y', 'id_pegawai' => $id_pegawai])->get();
            // dd($asets);
            return view('index', [
                'page' => $page,
                'asets' => $asets
            ]);
        }
        return view('index', [
            'page' => $page,
            'total_pegawai' => PegawaiModel::count(),
            'total_departemen' => DepartemenModel::count(),
            'total_aset' => AsetModel::count(),
        ]);
    }
}
