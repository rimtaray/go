<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbclaim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_claim', function (Blueprint $table) {
            $table->increments('c_id');
            $table->string('c_no',8);
            $table->integer('p_id');
            $table->string('c_cus_name',200);
            $table->date('c_receive');
            $table->date('c_return');
            $table->string('c_status',1);
            $table->decimal('c_cost',8,2);
            $table->decimal('c_price',8,2);
            $table->string('c_etc',200);
            $table->integer('c_uid_rec');
            $table->integer('c_uid_ret');
            $table->integer('c_uid_upd');
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
        Schema::dropIfExists('tb_claim');
    }
}
