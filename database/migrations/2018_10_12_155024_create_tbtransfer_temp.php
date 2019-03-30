<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbtransferTemp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transfer_temp', function (Blueprint $table) {
            $table->increments('ttemp_id');
            $table->integer('req_id');
            $table->integer('p_id');
            $table->string('u_id',10);
            $table->string('m_id',10);
            $table->string('p_barcode',50);
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
        Schema::dropIfExists('tb_transfer_temp');
    }
}
