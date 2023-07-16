<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_pendaftaran', function (Blueprint $table) {
            $table->id('id_pendaftaran');
            $table->string('nama');
            $table->string('gender');
            $table->bigInteger('nisn');
            $table->string('no_ijazah');
            $table->char('no_skhun');
            $table->bigInteger('no_un');
            $table->bigInteger('nik');
            $table->bigInteger('npsn_terdahulu');
            $table->string('sekolah_asal');
            $table->string('tmpt_lahir');
            $table->date('tgl_lahir');
            $table->string('agama');
            $table->boolean('disabilitas');
            $table->string('alamat_rmh');
            $table->string('dusun');
            $table->string('kel');
            $table->string('kec');
            $table->string('kab');
            $table->string('provinsi');
            $table->string('alat_transport');
            $table->string('j_tinggal');
            $table->bigInteger('telp');
            $table->string('email');
            $table->string('no_kks');
            $table->string('kps');
            $table->string('usulan_kip');
            $table->string('kip');
            $table->string('nama_kip');
            $table->string('ket_kip');
            $table->string('noreg_akta');
            $table->string('lintang');
            $table->string('bujur');
            $table->bigInteger('id_users')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pendaftaran');
    }
};
