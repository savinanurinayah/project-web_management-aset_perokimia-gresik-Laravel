<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pegawai', function (Blueprint $table) {
            $table->integer('nip_pegawai')->primary();
            $table->string('nama_pegawai', 100);
            $table->string('jenis_kelamin', 20);
            $table->bigInteger('no_telepon');
            $table->integer('id_departemen');
            $table->string('status', 20)->comment('ADMIN;USER;');
            $table->string('username', 100);
            $table->string('password', 100);
            $table->enum('aktif', ['y', 't'])->default('y');
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
        Schema::dropIfExists('tbl_pegawai');
    }
}
