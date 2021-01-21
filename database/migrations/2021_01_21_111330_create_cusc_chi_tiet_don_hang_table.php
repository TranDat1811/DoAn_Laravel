<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscChiTietDonHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_chi_tiet_don_hang', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigInteger('dh_ma')->comment('Đơn hàng # dh_ma # dh_ma # Mã đơn hàng');
            $table->bigInteger('sp_ma')->comment('Sản phẩm # sp_ma # sp_ten # Mã sản phẩm');
            $table->Integer('ctdh_soLuong')->default('1')->comment('Số lượng # Số lượng sản phẩm đặt mua');
            $table->decimal('ctdh_donGia', 19, 4)->comment('Đơn giá # Giá bán');

            $table->foreign('dh_ma') //cột kh_ma trong bảng cusc_don_hang
                ->references('dh_ma')->on('cusc_don_hang') //cột kh_ma trong bảng cusc_khach_hang
                ->onDelete('CASCADE') //các lựa chọn khi xoá và cập nhật
                ->onUpdate('CASCADE'); //không có bảng cha khi bảng con đang tham chiếu
            
            $table->foreign('sp_ma') //cột kh_ma trong bảng cusc_don_hang
                ->references('sp_ma')->on('cusc_san_pham') //cột kh_ma trong bảng cusc_khach_hang
                ->onDelete('CASCADE') //các lựa chọn khi xoá và cập nhật
                ->onUpdate('CASCADE'); //không có bảng cha khi bảng con đang tham chiếu    


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_chi_tiet_don_hang');
    }
}
