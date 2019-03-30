<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbmember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_member', function (Blueprint $table) {
            $table->increments('m_id');
            $table->integer('m_id_up');
            $table->string('m_name',100);
            $table->string('m_address',300);
            $table->string('m_tel',20);
            $table->string('m_mobile',10);
            $table->string('m_level',1);
            $table->string('m_status',1);
            $table->dateTime('m_register_date');
            $table->dateTime('m_expired');
            $table->string('m_taxid',13);
            $table->string('m_receipt',5);
            $table->string('m_type',100);
            $table->string('m_inv_no',13);
            $table->string('m_inv_name',100);
            $table->string('m_inv_add',300);
            $table->string('m_inv_tel',20);
            $table->string('m_idcard',13);
            $table->string('m_package',1);
            $table->string('m_buy',100);
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
        Schema::dropIfExists('tb_member');
    }
}
