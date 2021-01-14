<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscGiamGiaSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_giam_gia_san_pham', function (Blueprint $table) {
            $table->engine= "InnoDB";
            $table->bigInteger('id')->comment('STT');
            $table->bigInteger('sp_id')->comment('Sản phẩm id');
            $table->string('gg_ten', 500)->comment('Tên chương trình giảm giá');
            $table->double('gg_sotien')->comment('Số tiền giảm giá');
            $table->boolean('gg_macdinh')->default('0')->comment('Có giảm giá hay không #0 : không giảm giá, 1: giảm giá');
            $table->timestamp('gg_batdau')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo giảm giá');
            $table->timestamp('gg_ketthuc')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật giảm giá gần nhất');


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
        Schema::dropIfExists('cusc_giam_gia_san_pham');
    }
}
