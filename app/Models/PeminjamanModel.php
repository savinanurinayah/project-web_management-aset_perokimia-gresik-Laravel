<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_peminjaman';

    protected $primaryKey = 'id';
    protected $fillable = ['id_pegawai', 'id_aset', 'tanggal_peminjaman', 'deadline_pengembalian', 'tanggal_pengembalian', 'keterangan', 'keperluan', 'status', 'created_at', 'updated_at'];
}
