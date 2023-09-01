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
        Schema::create('tbl_hdepan', function (Blueprint $table) {
            $table->id('id_tabel');
            $table->bigInteger('id_agenda')->unique();
			$table->bigInteger('id_galeri')->unique();
			$table->bigInteger('id_profile')->unique();
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_hdepan');
    }
};
