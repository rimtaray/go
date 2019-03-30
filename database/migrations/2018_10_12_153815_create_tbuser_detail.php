<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbuserDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_user_detail', function (Blueprint $table) {
            $table->integer('u_id');
            $table->integer('m_id');
            $table->string('ud_level',1);
            $table->string('ud_position',50);
            $table->string('ud_phone',20);
            $table->string('ud_right',800);
            $table->string('ud_login',32);
            $table->string('ud_cstock',1);
            $table->string('ud_status',1);
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
        Schema::dropIfExists('tb_user_detail');
    }
}
