<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('nama');
            $table->string('no_hp');
            $table->timestamps();
        });

        Schema::table('pelanggan', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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

        Schema::table('pelanggan', function(Blueprint $table){
            
            // $table->dropIndex('pelanggan_user_id_foreign');
            $table->dropForeign('pelanggan_user_id_foreign');
            $table->dropColumn('user_id');
            // $table->dropForeign('pelanggan_alamat_id');
            // $table->dropIndex('pelanggan_alamat_id_foreign');
            // $table->dropColumn('id_alamat');
        });

        Schema::dropIfExists('pelanggan');
        
    }
}
