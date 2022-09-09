<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_masuk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_masuk');
            $table->timestamp('jam_masuk');
            $table->date('tanggal_masuk');
            $table->integer('jumlah_masuk');
            $table->integer('id_supplier');
            $table->integer('id_produk');
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
        Schema::dropIfExists('produk_masuk');
    }
}
