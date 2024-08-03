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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('no_id_brg');
            $table->date('tgl_masuk');
            $table->string('nm_brg');
            $table->float('stk_awal');
            $table->float('stk_terpakai')->default(0);
            $table->float('stk_sisa');
            $table->string('satuan');
            $table->float('hrg_brg');
            $table->float('ttl_brg');
            $table->string('ket');
            $table->string('asal');
            $table->string('ft_brg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
