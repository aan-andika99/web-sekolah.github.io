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

    $table->string('nama_ayah',50)->nullable();
    $table->string('disabilitas_ayah',5)->nullable();
    $table->string('pekerjaan_ayah',25)->nullable();
    $table->string('pendidikan_ayah',25)->nullable();
    $table->bigInteger('penghasilan_ayah')->nullable();

    $table->string('nama_ibu',50)->nullable();
    $table->string('disabilitas_ibu',5)->nullable();
    $table->string('pekerjaan_ibu',25)->nullable();
    $table->string('pendidikan_ibu',25)->nullable();
    $table->bigInteger('penghasilan_ibu')->nullable();

    $table->string('nama_wali',50)->nullable();
    $table->string('pekerjaan_wali',25)->nullable();
    $table->string('pendidikan_wali',25)->nullable();
    $table->bigInteger('penghasilan_wali')->nullable();
    
    $table->timestamp('created_at')->nullable();
    $table->timestamp('updated_at')->nullable();
    
    $table->bigInteger('id_user')->unique();

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
