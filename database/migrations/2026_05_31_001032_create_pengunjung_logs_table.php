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
        Schema::create('pengunjung_logs', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address', 45); // Untuk mendeteksi keunikan pengunjung hari ini
            $table->date('tanggal');               // Tanggal akses (Format: YYYY-MM-DD)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengunjung_logs');
    }
};
