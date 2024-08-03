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
        Schema::create('surattgss', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_surat');
            $table->integer('validasi_id');
            $table->string('petugas1');
            $table->string('petugas2');
            $table->string('petugas3');
            $table->string('petugas4');
            $table->string('petugas5');
            $table->text('tujuan1');
            $table->text('tujuan2');
            $table->text('tujuan3');
            $table->text('tujuan4');
            $table->text('tujuan5');
            $table->text('tujuan6');
            $table->text('tujuan7');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surattgss');
    }
};
