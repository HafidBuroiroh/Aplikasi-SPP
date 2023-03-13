<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_petugas')->references('id')->on('petugas')->onDelete('cascade');
            $table->foreignId('nisn')->references('id')->on('siswas')->onDelete('cascade');
            $table->date('tgl_bayar');
            $table->string('bulan_bayar');
            $table->string('tahun_bayar');
            $table->foreignId('id_spp')->references('id_spp')->on('siswas')->onDelete('cascade');
            $table->bigInteger('jumlah_bayar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayarans');
    }
};
