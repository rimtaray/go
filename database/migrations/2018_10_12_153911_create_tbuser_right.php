<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbuserRight extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_user_right', function (Blueprint $table) {
            $table->integer('ri_no');
            $table->string('ri_id',4);
            $table->string('ri_name',50);
            $table->string('ri_type',1);
            $table->string('ri_chk',1);
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
        Schema::dropIfExists('tb_user_right');
    }
}
