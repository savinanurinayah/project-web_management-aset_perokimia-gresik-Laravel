<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAsetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_aset', function (Blueprint $table) {
            $table->integer('id_aset', true);
            $table->string('kode', 20);
            $table->string('qr_code');
            $table->integer('id_kategori');
            $table->integer('nip_pegawai');
            $table->string('nama_aset', 100);
            $table->date('tanggal_pembelian');
            $table->integer('nilai_aset');
            $table->integer('id_lokasi');
            $table->text('detail_aset');
            $table->string('gambar', 200)->nullable();
            $table->string('kondisi', 100);
            $table->enum('aktif', ['y', 't']);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_aset');
    }
}
