<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnAlamatToPelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            //
            // $table->integer('id_alamat');
            $table->bigInteger('id_alamat')->unsigned()->change();
            $table->foreign('id_alamat')->references('id')->on('alamat')->onDelete('cascade');
            // $table->foreign('id_alamat')->references('id')->on('alamat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            //
            $table->dropForeign('pelanggan_alamat_foreign');
            // $table->dropColumn('')
        });
        // Schema::dropIfExists('pelanggan');
    }
}
