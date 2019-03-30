<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbreceive extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_receive', function (Blueprint $table) {
            $table->increments('re_id');
            $table->string('re_no',8);
            $table->date('re_date');
            $table->string('re_status',1);
            $table->string('o_id',11);
            $table->string('u_id',10);
            $table->string('re_num',5);
            $table->integer('p_id');
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
        Schema::dropIfExists('tb_receive');
    }
}
