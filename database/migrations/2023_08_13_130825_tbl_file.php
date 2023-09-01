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
    Schema::create('tbl_file', function (Blueprint $table) {
        $table->id('id_file');
    
        $table->string('ijazah')->nullable();
        $table->string('akta')->nullable();
        $table->string('kk')->nullable();
        $table->timestamp('created_at')->nullable();
        $table->timestamp('updated_at')->nullable();
        $table->string('status',20)->nullable();
        
        $table->bigInteger('id_user')->unique();
    
    });
        }
    
        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('tbl_file');
        }
    };
    