<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPhongbanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_phongban', function (Blueprint $table) {
            $table-> increments('id_phongban');
            $table-> string('ma_pb');
            $table-> string('ten_pb');
            $table-> string('so_luong');
            $table-> string('dia_chi');
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
        Schema::dropIfExists('tbl_phongban');
    }
}
