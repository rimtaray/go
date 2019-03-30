<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbproductDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_product_detail', function (Blueprint $table) {
            $table->increments('pd_id');
            $table->string('p_id',11);
            $table->dateTime('pd_import');
            $table->string('pd_num',5);
            $table->decimal('pd_cost',8,2);
            $table->date('pd_expired');
            $table->string('pd_alert',4);
            $table->string('pd_guarantee',5);
            $table->string('pd_status',1);
            $table->string('sup_id',11);
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
        Schema::dropIfExists('tb_product_detail');
    }
}
