<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Rename kolom
        DB::statement("ALTER TABLE blogs CHANGE COLUMN `judul` `title` VARCHAR(255)");
        DB::statement("ALTER TABLE blogs CHANGE COLUMN `isi` `content` TEXT");
        DB::statement("ALTER TABLE blogs CHANGE COLUMN `kategori_id` `category_id` BIGINT UNSIGNED");
        DB::statement("ALTER TABLE blogs CHANGE COLUMN `tanggal_publish` `published_at` TIMESTAMP NULL");
        
        Schema::table('blogs', function (Blueprint $table) {
            // Tambah kolom baru
            $table->text('excerpt')->nullable()->after('content');
            $table->string('thumbnail')->nullable()->after('gambar');
            $table->string('image')->nullable()->after('thumbnail');
        });

        // Hapus kolom yang tidak diperlukan
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropForeign(['penulis_id']);
            $table->dropColumn(['penulis_id', 'gambar']); // Hapus gambar juga
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Tambah kembali kolom yang dihapus
            $table->string('gambar')->nullable()->after('content');
            $table->foreignId('penulis_id')->constrained('users')->onDelete('cascade')->after('category_id');
            
            // Hapus kolom baru
            $table->dropColumn(['excerpt', 'thumbnail', 'image']);
        });

        // Kembalikan nama kolom
        DB::statement("ALTER TABLE blogs CHANGE COLUMN `title` `judul` VARCHAR(255)");
        DB::statement("ALTER TABLE blogs CHANGE COLUMN `content` `isi` TEXT");
        DB::statement("ALTER TABLE blogs CHANGE COLUMN `category_id` `kategori_id` BIGINT UNSIGNED");
        DB::statement("ALTER TABLE blogs CHANGE COLUMN `published_at` `tanggal_publish` TIMESTAMP NULL");
    }
};