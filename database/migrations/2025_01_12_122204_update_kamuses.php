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
        Schema::table('kamuses', function (Blueprint $table) {
            //
             // Menghapus kolom photos
             $table->dropColumn('kata');
             $table->dropColumn('arti');
             $table->dropColumn('jenis_kata');
             $table->dropColumn('con_kalimat');

             // Menambahkan kolom profile_picture
             $table->string('link')->nullable()->after('categories_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kamuses', function (Blueprint $table) {
            // Menambahkan kembali kolom photos
            $table->string('kata');
            $table->string('arti');
            $table->string('jenis_kata');
            $table->string('con_kalimat');

            // Menghapus kolom profile_picture
            $table->dropColumn('link');
        });
    }
};
