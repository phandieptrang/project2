<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChuyenNganh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('chuyen_nganh', function (Blueprint $table) {
            $table->increments('ma_chuyen_nganh');
            $table->string('ten_chuyen_nganh',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('chuyen_nganh');
    }
}
