<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblNhanvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table-> increments('id_NV');
            $table-> string('ten_NV');
            $table-> string('dien_thoai');
            $table-> string('e_mail');
            $table-> string('dia_chi');
            $table-> string('tai_khoan');
            $table-> string('mat_khau');
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
        Schema::dropIfExists('nhanvien');
    }
}
