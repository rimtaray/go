<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbsaleBill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sale_bill', function (Blueprint $table) {
            $table->increments('sb_id');
            $table->string('sb_no',10);
            $table->dateTime('sb_date');
            $table->decimal('sb_discount',8,2);
            $table->string('u_id',11);
            $table->string('m_id',11);
            $table->string('sb_status',1);
            $table->string('sb_m_status',1);
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
        Schema::dropIfExists('tb_sale_bill');
    }
}
