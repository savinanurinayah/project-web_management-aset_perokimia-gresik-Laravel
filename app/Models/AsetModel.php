<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetModel extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_aset';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_aset';
    protected $fillable = ['kode', 'qr_code', 'nama_aset','id_kategori','nip_pegawai', 'kondisi','tanggal_pembelian','nilai_aset','id_lokasi','detail_aset','gambar','aktif','created_at','updated_at'];
}
