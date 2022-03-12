<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_nhanvien', function (Blueprint $table) {
            $table-> increments('id_nhanvien');
            $table-> string('ma_nv');
            $table-> string('ho_nv');
            $table-> string('ten_nv');
            $table-> string('nam_sinh');
            $table-> string('gioi_tinh');
            $table-> string('que_quan');
            $table-> string('email');
            $table-> string('sdt');
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
        Schema::dropIfExists('tbl_nhanvien');
    }
}
