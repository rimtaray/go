<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbwallet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_wallet', function (Blueprint $table) {
            $table->increments('w_id');
            $table->integer('wc_id');
            $table->string('w_name',100);
            $table->decimal('w_amount',8,2);
            $table->string('w_etc',200);
            $table->date('w_dt');
            $table->dateTime('w_dt_rec');
            $table->string('m_id',10);
            $table->string('u_id',10);
            $table->string('w_status',1);
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
        Schema::dropIfExists('tb_wallet');
    }
}
