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
        Schema::create('kamuses', function (Blueprint $table) {
            $table->id();
            $table->string('kata');
            $table->string('arti');
            $table->string('jenis_kata');
            $table->string('con_kalimat');
            $table->foreignId('categories_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamuses');
    }
};
