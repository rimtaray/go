<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbinvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_invoice', function (Blueprint $table) {
            $table->increments('i_id');
            $table->string('m_id',10);
            $table->string('u_id',10);
            $table->string('sb_no',10);
            $table->date('i_date');
            $table->string('i_refer',10);
            $table->string('i_no',10);
            $table->string('i_name',200);
            $table->string('i_add', 200);
            $table->string('i_tel',20);
            $table->string('i_office',100);
            $table->string('i_idcard',20);
            $table->string('i_type',2);
            $table->string('i_status',1);
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
        Schema::dropIfExists('tb_invoice');
    }
}
