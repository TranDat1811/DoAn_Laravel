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
            $table->bigInteger('id')->autoIncrement()->comment('STT khách hàng');
            $table->bigInteger('sp_id')->comment('Sản phẩm id');
            $table->bigInteger('kh_id')->comment('Khách hàng id');
            $table->float('nx_danhgia')->comment('Xếp hạnh đánh giá sản phẩm');
            $table->text('nx_binhluan')->comment('Bình luận về sản phẩm');
            $table->timestamp('nx_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo nhận xét');
            $table->timestamp('nx_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật nhận xét gần nhất');
            
            $table->foreign('sp_id')
                ->references('id')->on('cusc_san_pham')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->foreign('kh_id')
                ->references('id')->on('cusc_khach_hang')
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
