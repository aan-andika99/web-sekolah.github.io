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
        Schema::create('profile_sekolah', function (Blueprint $table) {
            $table->id('id_profile');
            $table->string('nama_sekolah');
            $table->bigInteger('telp')->nullable();
            $table->bigInteger('no_hp')->nullable();
			$table->string('email');
            $table->string('alamat');
			$table->string('visi');
			$table->string('misi');
			$table->string('pendiri');
			$table->string('sambutan');
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_sekolah');
    }
};
