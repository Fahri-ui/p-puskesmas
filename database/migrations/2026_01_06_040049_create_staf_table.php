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
        Schema::create('staf', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('jabatan');
            $table->string('bidang')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('email')->nullable();
            $table->string('foto')->nullable();
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif');
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staf');
    }
};
