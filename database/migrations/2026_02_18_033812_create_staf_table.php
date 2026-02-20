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

            $table->string('foto')->nullable(); // path file foto
            $table->string('nama');
            $table->string('telepon')->nullable();
            $table->string('email')->unique();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']); // L = Laki-laki, P = Perempuan
            $table->date('tanggal_lahir');
            $table->string('profesi')->nullable();
            $table->string('nip')->unique();
            $table->string('jabatan');
            $table->text('deskripsi')->nullable(); // tentang staf
            $table->text('alamat')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->date('bergabung_sejak')->nullable();
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
