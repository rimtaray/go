<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbsale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sale', function (Blueprint $table) {
            $table->increments('s_id');
            $table->integer('p_id');
            $table->integer('u_id');
            $table->string('s_num',4);
            $table->string('s_status',1);
            $table->decimal('s_price',8,2);
            $table->string('sb_no',10);
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
        Schema::dropIfExists('tb_sale');
    }
}
