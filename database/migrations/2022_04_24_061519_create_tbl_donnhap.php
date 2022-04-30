<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDonnhap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donnhap', function (Blueprint $table) {
            $table-> increments('id_DN');
            $table-> string('ngay_mua');
            $table-> string('id_NV');
            $table-> string('id_NCC');
            $table-> string('id_TH');
            $table-> string('thanh_tien');
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
        Schema::dropIfExists('donnhap');
    }
}
