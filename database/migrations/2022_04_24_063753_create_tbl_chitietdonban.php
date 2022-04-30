<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblChitietdonban extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonban', function (Blueprint $table) {
            $table-> increments('id_CTDX');
            $table-> string('id_DX');
            $table-> string('ten_HH');
            $table-> string('id_DVT');
            $table-> string('gia_nhap');
            $table-> string('gia_xuat');
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
        Schema::dropIfExists('chitietdonban');
    }
}
