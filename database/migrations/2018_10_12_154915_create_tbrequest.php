<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbrequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_request', function (Blueprint $table) {
            $table->increments('req_id');
            $table->string('req_mid_send',10);
            $table->string('req_mid_receive',10);
            $table->dateTime('req_date_send');
            $table->string('req_uid_req',11);
            $table->string('req_uid_apr',11);
            $table->integer('p_id');
            $table->string('req_num_send',4);
            $table->string('req_num_app',4);
            $table->string('req_status',1);
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
        Schema::dropIfExists('tb_request');
    }
}
