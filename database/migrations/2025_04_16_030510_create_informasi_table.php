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
            Schema::create('informasi', function (Blueprint $table) {
                $table->uuid('id_informasi')->primary();
                $table->string('foto');
                $table->string('judul');
                $table->text('deskripsi');
                $table->date('tanggal');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('informasi');
        }
};
