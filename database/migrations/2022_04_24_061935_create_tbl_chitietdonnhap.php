<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblChitietdonnhap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonnhap', function (Blueprint $table) {
            $table-> increments('id_CTDN');
            $table-> string('id_DN');
            $table-> string('ten_HH');
            $table-> string('id_DVT');
            $table-> string('gia_nhap');
            $table-> string('so_luong');
            $table-> string('thanh_tien');
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
        Schema::dropIfExists('chitietdonnhap');
    }
}
