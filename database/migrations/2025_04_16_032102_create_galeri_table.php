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
        Schema::create('galeri', function (Blueprint $table) {
<<<<<<< HEAD
            $table->id('id_galeri');
=======
            $table->uuid('id_galeri');
>>>>>>> 9b06d06b7a03c2182a4c2402ee0c2f2cd31a1b7f
            $table->string('foto');
            $table->string('judul');
            $table->datetime('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeri');
    }
};
