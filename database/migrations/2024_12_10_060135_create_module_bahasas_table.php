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
        Schema::create('module_bahasas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug');
            $table->foreignId('Category_id')->constrained()->onDelete('cascade');
            $table->string('cover');
            $table->string('judul');
            $table->string('description');
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bahasas');
    }
};
