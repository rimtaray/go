<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbtempPro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_temp_pro', function (Blueprint $table) {
            $table->increments('tp_id');
            $table->string('tp_barcode',30);
            $table->string('tp_num',4);
            $table->string('u_id',10);
            $table->string('m_id',10);
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
        Schema::dropIfExists('tb_temp_pro');
    }
}
