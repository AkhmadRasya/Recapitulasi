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
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id('id_user');
                $table->string('nik', 16)->nullable()->unique();
                $table->string('nama_lengkap', 100);
                $table->string('username', 50)->unique();
                $table->string('password');
                $table->enum('role', ['admin', 'pegawai', 'warga'])->default('admin');
                $table->rememberToken();
                $table->timestamp('created_at')->useCurrent();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
