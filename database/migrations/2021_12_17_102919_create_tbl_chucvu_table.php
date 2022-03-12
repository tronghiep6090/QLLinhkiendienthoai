<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblChucvuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chucvu', function (Blueprint $table) {
            $table-> increments('id_chucvu');
            $table-> string('ma_cv');
            $table-> string('ten_cv');
            $table-> string('luong');
            $table-> string('mo_ta');
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
        Schema::dropIfExists('tbl_chucvu');
    }
}
