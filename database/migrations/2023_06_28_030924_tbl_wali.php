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
        		
Schema::create('tbl_wali', function (Blueprint $table) {
    $table->id('id_wali');
    $table->string('nama_ayah');
    $table->bigInteger('pekerjaan_ayah');
    $table->integer('penghasilan_ayah');
    $table->string('nama_ibu');
    $table->string('disabilitas_ibu');
    $table->string('pekerjaan_ibu');
    $table->integer('penghasilan_ibu');
    $table->string('nama_wali');
    $table->integer('penghasilan_wali');
    $table->string('pekerjaan_wali');
    $table->bigInteger('id_users')->unique();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_wali');
    }
};
