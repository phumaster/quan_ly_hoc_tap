<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('diemTrenLop');
            $table->string('diemGiuaKy');
            $table->string('diemChuyenCan');
            $table->integer('diemTrungBinh');
            $table->integer('soTietNghi')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->integer('subjects_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('scores');
    }
}
