<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('detail_koleksi', function (Blueprint $table) {
            $table->id('id');
            $table->string('deskripsi');
            $table->string('sejarah');
            $table->string('asal_daerah');
            $table->foreignId('id_koleksi')->constrained('koleksi')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('detail_koleksi');
    }
};
