<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscHinhAnhSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_hinh_anh_san_pham', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigInteger('id')->comment('STT');
            $table->bigInteger('sp_id')->comment('Sản phẩm id');
            $table->string('hinhanh',500)->comment('Hình ảnh liên quan sản phẩm');

            $table->primary(['sp_id', 'id']);
            $table->foreign('sp_id')
                ->references('id')->on('cusc_san_pham')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_hinh_anh_san_pham');
    }
}
