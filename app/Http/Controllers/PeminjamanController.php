<?php

namespace App\Http\Controllers;

use App\Models\AsetModel;
use App\Models\LokasiModel;
use Illuminate\Support\Str;
use App\Models\PegawaiModel;
use Illuminate\Http\Request;
use App\Models\DepartemenModel;
use App\Models\PeminjamanModel;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        $lokasi = $request->get('lokasi');
        $nip_pegawai = session('userdata')['nip_pegawai'];
        $aset = AsetModel::
        join('tbl_kategori_aset', 'tbl_kategori_aset.id_kategori', '=', 'tbl_aset.id_kategori')
        ->join('tbl_lokasi_aset', 'tbl_lokasi_aset.id_lokasi', '=', 'tbl_aset.id_lokasi')
        ->select('tbl_aset.*', 'tbl_kategori_aset.nama as nama_kategori', 'tbl_lokasi_aset.nama as nama_lokasi',
            DB::raw("(SELECT tbl_peminjaman.status FROM tbl_peminjaman WHERE tbl_peminjaman.id_aset = tbl_aset.id_aset
                AND tbl_peminjaman.id_pegawai = {$nip_pegawai}
                AND tbl_peminjaman.status NOT IN ('DITOLAK', 'SELESAI')
                AND tbl_aset.aktif='y' LIMIT 1) as status_peminjaman"),
            DB::raw("(SELECT tbl_peminjaman.status FROM tbl_peminjaman WHERE tbl_peminjaman.id_aset = tbl_aset.id_aset
                AND tbl_peminjaman.status NOT IN ('DITOLAK', 'SELESAI')
                AND tbl_aset.aktif='y' LIMIT 1) as status_peminjaman_pegawai"))
        ->where('tbl_aset.kode', 'like', '%'.strtolower($q).'%')
        ->where('tbl_lokasi_aset.nama', 'like', '%'.strtolower($lokasi).'%')
        ->where(['tbl_aset.aktif' => 'y'])->get();
        return view('index', [
            'page' => 'peminjaman.peminjaman',
            'asets' => $aset
        ]);
    }


    public function data(Request $request)
    {

        $status = $request->get('status');
        $peminjam = $request->get('peminjam');

        if( $status || $peminjam) {
            $peminjaman = AsetModel::
            join('tbl_kategori_aset', 'tbl_kategori_aset.id_kategori', '=', 'tbl_aset.id_kategori')
            ->join('tbl_lokasi_aset', 'tbl_lokasi_aset.id_lokasi', '=', 'tbl_aset.id_lokasi')
            ->join('tbl_peminjaman', 'tbl_peminjaman.id_aset', '=', 'tbl_aset.id_aset')
            ->join('tbl_pegawai', 'tbl_peminjaman.id_pegawai', '=', 'tbl_pegawai.nip_pegawai')
            ->select('tbl_aset.*', 'tbl_kategori_aset.nama as nama_kategori',
                    'tbl_lokasi_aset.nama as nama_lokasi', 'tbl_pegawai.nama_pegawai', 'tbl_pegawai.nip_pegawai',
                    'tbl_peminjaman.id as id_peminjaman','tbl_peminjaman.tanggal_peminjaman', 'tbl_peminjaman.deadline_pengembalian', 'tbl_peminjaman.tanggal_pengembalian', 'tbl_peminjaman.keterangan',
                    'tbl_peminjaman.keperluan', 'tbl_peminjaman.status as status_peminjaman', 'nama_pegawai')
            ->where('tbl_peminjaman.status', 'like', '%'.strtolower($status).'%')
            ->where('tbl_pegawai.nama_pegawai', 'like', '%'.strtolower($peminjam).'%')
            ->where(['tbl_aset.aktif' => 'y'])->get();
        } else {
            $peminjaman = AsetModel::
            join('tbl_kategori_aset', 'tbl_kategori_aset.id_kategori', '=', 'tbl_aset.id_kategori')
            ->join('tbl_lokasi_aset', 'tbl_lokasi_aset.id_lokasi', '=', 'tbl_aset.id_lokasi')
            ->join('tbl_peminjaman', 'tbl_peminjaman.id_aset', '=', 'tbl_aset.id_aset')
            ->join('tbl_pegawai', 'tbl_peminjaman.id_pegawai', '=', 'tbl_pegawai.nip_pegawai')
            ->select('tbl_aset.*', 'tbl_kategori_aset.nama as nama_kategori', 'tbl_lokasi_aset.nama as nama_lokasi',
                'tbl_pegawai.nama_pegawai', 'tbl_pegawai.nip_pegawai', 'tbl_peminjaman.id as id_peminjaman',
                'tbl_peminjaman.tanggal_peminjaman', 'tbl_peminjaman.deadline_pengembalian', 'tbl_peminjaman.tanggal_pengembalian', 'tbl_peminjaman.keterangan',  'tbl_peminjaman.keperluan',
                'tbl_peminjaman.status as status_peminjaman', 'nama_pegawai')
            ->where(['tbl_aset.aktif' => 'y'])->get();
        }

        return view('index', [
            'page' => 'peminjaman.data-peminjaman',
            'asets' => $peminjaman
        ]);
    }


    public function post_tambah(Request $request)
    {
        $qr_code = Str::random(20);
        $id_aset = $request->id_aset;
        $nip_pegawai = session('userdata')['nip_pegawai'];
        $peminjaman = AsetModel::where(['id_aset' => $id_aset])
        ->select("tbl_aset.*", DB::raw("(SELECT tbl_peminjaman.id FROM tbl_peminjaman WHERE tbl_peminjaman.id_aset = tbl_aset.id_aset
            AND tbl_peminjaman.status = 'DITERIMA' AND tbl_aset.aktif='y' LIMIT 1) as id_peminjaman"))->first();
        if(!$peminjaman) {
            return back()->with('error', 'Aset tidak ditemukan!');
        }
        if($peminjaman->id_peminjaman) {
            return back()->with('error', 'Aset masih dipinjam oleh pegawai lain!');
        }
        PeminjamanModel::create([
            'id_aset' => $id_aset,
            'id_pegawai' => $nip_pegawai,
            'qr_code' => $qr_code,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'deadline_pengembalian' => $request->deadline_pengembalian,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'keterangan' => $request->keterangan,
            'keperluan' => $request->keperluan,
            'created_at' => date('Y-m-d H:m:s'),
        ]);
        return back()->with('success', 'Aset berhasil diproses. Silahkan menunggu konfirmasi dari admin!');
    }


    public function edit($id)
    {
        $peminjaman = PeminjamanModel::where(['id' => $id])->first();
        return view('index', [
            'page' => 'peminjaman.edit-peminjaman',
            'peminjaman' => $peminjaman
        ]);
    }

    public function post_edit($id, Request $request)
    {
        $peminjaman = PeminjamanModel::find($id);
        if(!$peminjaman) {
            return back()->withInput()->with('error', 'Peminjaman tidak ditemukan!');
        }
        $data_peminjaman = [
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'keterangan' => $request->keterangan,
        ];
        $peminjaman->where(['id' => $id])->update($data_peminjaman);
        return redirect()->route('data-peminjaman')->with('success', 'peminjaman berhasil diedit');

    }

    public function update(Request $request)
    {
        $id_peminjaman = $request->id;
        $status = $request->status;
        $peminjaman = PeminjamanModel::where(['id'=>$id_peminjaman])->first();
        if(!$peminjaman) {
            return back()->with('error', 'Peminjaman tidak ditemukan!');
        }
        $peminjaman->where(['id' => $id_peminjaman])->update(['status' => strtoupper($status)]);
        return back()->with('success', 'Status peminjaman berhasil dirubah!');
    }

    public function cetak()
    {
        $nip_pegawai = session('userdata')['nip_pegawai'];
        return view('peminjaman.cetak', [
            'page' => 'peminjaman.cetak_data_peminjaman',
            'asets' => AsetModel::
            join('tbl_kategori_aset', 'tbl_kategori_aset.id_kategori', '=', 'tbl_aset.id_kategori')
            ->join('tbl_lokasi_aset', 'tbl_lokasi_aset.id_lokasi', '=', 'tbl_aset.id_lokasi')
            ->join('tbl_peminjaman', 'tbl_peminjaman.id_aset', '=', 'tbl_aset.id_aset')
            ->join('tbl_pegawai', 'tbl_peminjaman.id_pegawai', '=', 'tbl_pegawai.nip_pegawai')
            ->select('tbl_aset.*', 'tbl_kategori_aset.nama as nama_kategori', 'tbl_lokasi_aset.nama as nama_lokasi', 'tbl_pegawai.nama_pegawai', 'tbl_pegawai.nip_pegawai', 'tbl_peminjaman.id as id_peminjaman','tbl_peminjaman.tanggal_peminjaman', 'tbl_peminjaman.deadline_pengembalian', 'tbl_peminjaman.tanggal_pengembalian', 'tbl_peminjaman.keterangan', 'tbl_peminjaman.keperluan', 'tbl_peminjaman.status as status_peminjaman', 'nama_pegawai')
            ->where(['tbl_aset.aktif' => 'y'])->get()
        ]);
    }

}
