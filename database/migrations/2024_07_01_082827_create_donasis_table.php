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
        Schema::create('donasis', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_donatur');
            $table->foreign('id_donatur')->references('id')->on('users');
            $table->unsignedBigInteger('id_mahasiswa');
            $table->foreign('id_mahasiswa')->references('id')->on('users');
            $table->unsignedBigInteger('id_permintaan');
            $table->foreign('id_permintaan')->references('id')->on('permintaans');
            $table->String('jenis_donasi');
            $table->string('nama_barang');
            $table->string('deskripsi');
            $table->string('kuantitas');
            $table->string('metode_pengiriman');            
            $table->string('bukti_pengiriman');            
            $table->string('bukti_penerima');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donasis');
    }
};
