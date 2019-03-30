<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbwalletCat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_wallet_cat', function (Blueprint $table) {
            $table->increments('wc_id');
            $table->string('wc_name',100);
            $table->string('m_id',10);
            $table->string('wc_type',1);
            $table->string('wc_cat',100);
            $table->string('wc_status',1);
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
        Schema::dropIfExists('tb_wallet_cat');
    }
}
