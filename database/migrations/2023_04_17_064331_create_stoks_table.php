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
        Schema::create('stoks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_produk');
            $table->foreignId('produk_id');
            $table->string('nama_produk');
            $table->date('tanggal');
            $table->enum('keterangan', ['Masuk', 'Keluar'])->nullable();
            $table->bigInteger('jumlah');
            $table->bigInteger('harga_beli')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stoks');
    }
};
