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
        Schema::create('logmaterials', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pakai');
            $table->integer('validasi_id');
            $table->integer('barang_id');
            $table->integer('unit_pakai');
            $table->string('stn_pakai');
            $table->text('lokasi_pakai');
            $table->text('keterangan');
            $table->integer('wkl_pgwlog');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logmaterials');
    }
};
