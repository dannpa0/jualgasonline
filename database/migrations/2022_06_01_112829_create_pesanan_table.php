<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pelanggan')->unsigned();
            $table->bigInteger('id_produk')->unsigned();
            $table->integer('jumlah_produk');
            $table->double('total_harga');
            $table->timestamps();
        });

        Schema::table('pesanan', function(Blueprint $table) {
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan')->onDelete('cascade');
            $table->foreign('id_produk')->references('id')->on('produk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pesanan', function(Blueprint $table){
            $table->dropForeign('pesanan_pelanggan_id_foreign');
            $table->dropIndex('pesanan_pelanggan_id_idx');
            $table->dropColumn('id_pelanggan');
            $table->dropForeign('pesanan_produk_id_foreign');
            $table->dropIndex('pesanan_produk_id_idx');
            $table->dropColumn('id_produk');
        });

        Schema::dropIfExists('pesanan');
        
    }
}
