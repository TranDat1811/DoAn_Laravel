<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscNhanXetSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_nhan_xet_san_pham', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigInteger('nx_ma')->autoIncrement()->comment('STT Nhận xét');
            $table->bigInteger('sp_ma')->comment('Mã sản phẩm');
            $table->bigInteger('kh_ma')->comment('Mã khách hàng');
            $table->float('nx_danhGia')->comment('Xếp hạnh đánh giá sản phẩm');
            $table->text('nx_binhLuan')->comment('Bình luận về sản phẩm');
            $table->timestamp('nx_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo nhận xét');
            $table->timestamp('nx_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật nhận xét gần nhất');
            
            $table->foreign('sp_ma')
                ->references('sp_ma')->on('cusc_san_pham')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->foreign('kh_ma')
                ->references('kh_ma')->on('cusc_khach_hang')
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
        Schema::dropIfExists('cusc_nhan_xet_san_pham');
    }
}
