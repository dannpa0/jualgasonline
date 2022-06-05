<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnStatusInPesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //ON_PROCESS
        //ON_DELIVERY
        //CANCELLED
        //DONE
        Schema::table('pesanan', function (Blueprint $table) {
            //
            $table->text('status');
            $table->boolean('is_cod')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pesanan', function (Blueprint $table) {
            //
            $table->dropColumn('status');
            $table->dropColumn('is_cod');
        });
    }
}
