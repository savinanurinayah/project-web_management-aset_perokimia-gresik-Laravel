<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_peminjaman', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_pegawai');
            $table->integer('id_aset');
            $table->string('qr_code');
            $table->dateTime('tanggal_peminjaman');
            $table->dateTime('deadline_pengembalian');
            $table->dateTime('tanggal_pengembalian')->nullable();
            $table->text('keperluan');
            $table->enum('status', ['PROSES', 'DITERIMA', 'DITOLAK', 'SELESAI']);
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('tbl_peminjaman');
    }
}
