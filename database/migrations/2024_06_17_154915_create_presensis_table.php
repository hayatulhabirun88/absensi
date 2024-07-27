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
        Schema::create('presensis', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_presensi');
            $table->enum('status_kehadiran', ['Hadir', 'Tidak Hadir']);
            $table->bigInteger('ekstrakulikuler_id');
            $table->bigInteger('pembina_id');
            $table->bigInteger('pendaftar_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensis');
    }
};
