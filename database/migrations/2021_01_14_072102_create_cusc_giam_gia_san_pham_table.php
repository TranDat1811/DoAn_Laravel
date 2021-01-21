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
            $table->bigInteger('gg_ma')->comment('Stt giảm giá');
            $table->bigInteger('sp_ma')->comment('Mã sản phẩm');
            $table->string('gg_ten', 500)->comment('Tên chương trình giảm giá');
            $table->double('gg_soTien')->comment('Số tiền giảm giá');
            $table->boolean('gg_macDinh')->default('0')->comment('Có giảm giá hay không #0 : không giảm giá, 1: giảm giá');
            $table->timestamp('gg_batDau')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo giảm giá');
            $table->timestamp('gg_ketThuc')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật giảm giá gần nhất');


            $table->primary(['sp_ma', 'gg_ma']);
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
        Schema::dropIfExists('cusc_giam_gia_san_pham');
    }
}
