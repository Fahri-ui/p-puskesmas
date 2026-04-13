<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('staf', function (Blueprint $table) {
            // Klaster pengelompokan di struktur organisasi
            $table->enum('klaster', [
                'kepala',
                'klaster_1',
                'klaster_2',
                'klaster_3',
                'klaster_4',
                'lintas_klaster',
            ])->nullable()->after('jabatan');

            // Peran dalam klaster: 'pj' = penanggung jawab, 'anggota' = anggota klaster
            $table->enum('peran_klaster', ['pj', 'anggota'])->default('anggota')->after('klaster');
        });
    }

    public function down(): void
    {
        Schema::table('staf', function (Blueprint $table) {
            $table->dropColumn(['klaster', 'peran_klaster']);
        });
    }
};
