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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nisn')->unique();
            $table->integer('nis');
            $table->string('nama');
            $table->foreignId('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
            $table->string('alamat');
            $table->bigInteger('no_telp');
            $table->foreignId('id_spp')->references('id')->on('spps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
};
