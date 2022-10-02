<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiModel extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_pegawai';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'nip_pegawai';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nip_pegawai', 'nama_pegawai', 'jenis_kelamin', 'status', 'no_telepon', 'id_departemen', 'username', 'password', 'aktif', 'created_at', 'updated_at'];
}
