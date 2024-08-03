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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_lapor');
            $table->string('nama');
            $table->text('alamat');
            $table->string('no_tlp');
            $table->text('masalah');
            $table->integer('skala_id');
            $table->integer('penanganan_id');
            $table->integer('validasi_id');
            $table->text('lokasi');
            $table->integer('kec_id');
            $table->integer('kel_id');
            $table->string('maps');
            $table->text('deskripsi');
            $table->string('ft_pju');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
