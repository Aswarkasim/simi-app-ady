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
        Schema::create('transaksi_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('transaksi_id');
            $table->unsignedBigInteger('produk_id');
            $table->string('produk_name')->nullable();
            $table->integer('quantity');
            $table->integer('promo_diskon')->default(0);
            $table->decimal('price', 10, 2);

            $table->foreign('transaksi_id')
                ->references('id')
                ->on('transaksis')
                ->onDelete('cascade');

            $table->foreign('produk_id')
                ->references('id')
                ->on('produks')
                ->onDelete('cascade');


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
        Schema::dropIfExists('transaksi_details');
    }
};
