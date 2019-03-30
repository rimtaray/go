<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTborder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_order', function (Blueprint $table) {
            $table->increments('o_id');
            $table->string('o_no',8);
            $table->date('o_date');
            $table->string('o_status',1);
            $table->integer('sup_id');
            $table->string('m_id',10);
            $table->string('u_id',10);
            $table->string('o_etc',200);
            $table->string('o_vat',1);
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
        Schema::dropIfExists('tb_order');
    }
}
