<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDonxuat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donxuat', function (Blueprint $table) {
            $table-> increments('id_DX');
            $table-> string('ngay_ban');
            $table-> string('id_NV');
            $table-> string('id_KH');
            $table-> string('id_TH');
            $table-> string('tong');
            $table-> string('trang_thai');
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
        Schema::dropIfExists('donxuat');
    }
}
