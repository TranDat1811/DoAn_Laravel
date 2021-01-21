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
            $table->bigInteger('ha_ma')->comment('STT');
            $table->bigInteger('sp_ma')->comment('Sản phẩm mã');
            $table->string('ha_ten',500)->comment('Hình ảnh liên quan sản phẩm');

            $table->primary(['sp_ma', 'ha_ma']);
            $table->foreign('sp_ma')
                ->references('sp_ma')->on('cusc_san_pham')
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
