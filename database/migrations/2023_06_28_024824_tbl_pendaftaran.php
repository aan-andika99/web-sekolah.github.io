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
            // $table->string('email')->primary();
            $table->bigInteger('nisn')->nullable();
            $table->bigInteger('nis')->nullable();
            $table->string('no_ijazah',20)->nullable();
            $table->string('no_skhun',20)->nullable();
            $table->bigInteger('no_un')->nullable();
            $table->bigInteger('nik')->nullable();
            $table->bigInteger('npsn_terdahulu')->nullable();
            $table->string('sekolah_asal',25)->nullable();
            $table->string('tmpt_lahir',10)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('agama',10)->nullable();
            $table->string('disabilitas',10)->nullable();
            $table->text('alamat_rmh',30)->nullable();
            $table->string('dusun',20)->nullable();
            $table->string('kel',20)->nullable();
            $table->string('kec',20)->nullable();
            $table->string('kab',20)->nullable();
            $table->string('provinsi',20)->nullable();
            $table->string('alat_transport',20)->nullable();
            $table->string('j_tinggal',20)->nullable();
            $table->bigInteger('telp')->nullable();
            $table->string('no_kks',20)->nullable();
            $table->string('kps',20)->nullable();
            $table->string('usulan_pip',20)->nullable();
            $table->string('kip',20)->nullable();
            $table->string('nama_kip',20)->nullable();
            $table->string('ket_kip',20)->nullable();
            $table->string('noreg_akta',20)->nullable();
            $table->string('lintang',20)->nullable();
            $table->string('bujur',20)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->boolean('is_filled')->default(false)->nullable();
            $table->string('registration_code')->nullable()->unique();
            $table->bigInteger('id_user')->unique();
            
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
