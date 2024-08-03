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
        Schema::create('perbaikans', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_lpprbk');
            $table->string('nm_pelapor');
            $table->string('laporan');
            $table->text('lks_laporan');
            $table->text('dftr_mtrl');
            $table->text('dftr_unitmtrl');
            $table->integer('penanganan_id');
            $table->text('ket_pengadaan');
            $table->integer('validasi_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perbaikans');
    }
};
