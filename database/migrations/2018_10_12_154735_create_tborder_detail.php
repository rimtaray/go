<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTborderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_order_detail', function (Blueprint $table) {
            $table->increments('od_id');
            $table->string('od_no',100);
            $table->string('od_name',100);
            $table->string('od_model',100);
            $table->string('od_num',10);
            $table->decimal('od_price',8,2);
            $table->string('od_rec_num',10);
            $table->string('o_id',11);
            $table->string('u_id',10);
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
        Schema::dropIfExists('tb_order_detail');
    }
}
