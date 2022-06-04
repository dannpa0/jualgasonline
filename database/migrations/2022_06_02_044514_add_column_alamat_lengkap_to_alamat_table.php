<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnAlamatLengkapToAlamatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alamat', function (Blueprint $table) {
            //
            $table->string('alamat_lengkap');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alamat', function (Blueprint $table) {
            //
            $table->dropColumn('alamat_lengkap');
        });
    }
}
