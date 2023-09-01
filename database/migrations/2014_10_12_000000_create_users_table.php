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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('fname',50);
            $table->string('mname',50)->nullable();
            $table->string('lname',50);
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('jenis_kelamin',15)->nullable();
            $table->string('role',10);
            $table->rememberToken()->nullable();
            $table->string('verify_key',100)->nullable();
            $table->string('status',10);
            $table->integer('active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
