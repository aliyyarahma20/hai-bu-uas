<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('visit_date');
            $table->softDeletes();
            $table->timestamps();

            // Tambahkan constraint unique pada user_id dan visit_date
            $table->unique(['user_id', 'visit_date']);
        });
    }


    public function down()
    {
        Schema::dropIfExists('user_activities');
    }
};