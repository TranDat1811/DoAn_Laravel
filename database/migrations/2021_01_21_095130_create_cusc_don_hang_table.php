<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscDonHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_don_hang', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigInteger('dh_ma')->autoIncrement()->comment('Mã đơn hàng');
            $table->bigInteger('kh_ma')->comment('Mã khách hàng #Mã khách hàng');
            $table->dateTime('dh_thoiGianDatHang')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời gian đặt hàng #Thời gian đặt hàng');
            $table->dateTime('dh_thoiGianNhanHang')->comment('Thời gian nhận hàng #Thời gian nhận hàng');
            $table->string('dh_nguoiNhan')->comment('Người nhận #Họ tên người nhận');
            $table->string('dh_diaChi', 250)->comment('Địa chỉ người nhận #Địa chỉ người nhận');
            $table->string('dh_dienThoai', 11)->comment('Điện thoại người nhận #Điện thoại người nhận');
            $table->string('dh_nguoiGui', 100)->comment('Người gửi #Họ tên người gửi');
            $table->text('dh_loiChuc')->comment('Lời chúc #Lời chúc ghi trên thiệp');
            $table->tinyInteger('dh_daThanhToan')->default('0')->comment('Đã thanh toán #Đã thanh toán tiền #0: chưa, #1: đã thanh toán');
            $table->bigInteger('nv_xuLy')->default('0')->comment('Mã nhân viên xử lý #Xử lý đơn hàng, #0 : chưa phân công');
            $table->dateTime('dh_ngayXuLy')->nullable()->comment('Thời điểm xử lý #Thời điểm xử lý đơn hàng');
            $table->bigInteger('nv_giaoHang')->default('0')->comment('Giao hàng # nv_ma # nv_hoTen # Mã nhân viên (người lập phiếu giao hàng và giao hàng), 0-chưa phân công');
            $table->dateTime('dh_ngayLapPhieuGiao')->nullable()->comment('Thời điểm lập phiếu giao # Thời điểm lập phiếu giao');
            $table->dateTime('dh_ngayGiaoHang')->nullable()->comment('Thời điểm khách nhận được hàng # Thời điểm khách nhận được hàng');
            $table->timestamp('dh_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo đơn hàng');
            $table->timestamp('dh_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật đơn hàng gần nhất');
            $table->tinyInteger('dh_trangThai')->default('2')->comment('Trạng thái # Trạng thái đơn hàng: 1-khóa, 2-khả dụng');
            $table->bigInteger('vc_ma')->comment('Dịch vụ giao hàng # vc_ma # vc_ten # Mã dịch vụ giao hàng');
            $table->bigInteger('tt_ma')->comment('Phương thức thanh toán # tt_ma # tt_ten # Mã phương thức thanh toán');
            
            $table->foreign('kh_ma') //cột kh_ma trong bảng cusc_don_hang
                ->references('kh_ma')->on('cusc_khach_hang') //cột kh_ma trong bảng cusc_khach_hang
                ->onDelete('CASCADE') //các lựa chọn khi xoá và cập nhật
                ->onUpdate('CASCADE'); //không có bảng cha khi bảng con đang tham chiếu

            $table->foreign('nv_xuLy') //cột nv_xuLy trong bảng cusc_don_hang
                ->references('nv_ma')->on('cusc_nhan_vien') //cột nv_ma trong bảng cusc_nhan_vien
                ->onDelete('CASCADE') //các lựa chọn khi xoá và cập nhật
                ->onUpdate('CASCADE'); //không có bảng cha khi bảng con đang tham chiếu    

            $table->foreign('nv_giaoHang') //cột nv_giaoHang trong bảng cusc_don_hang
                ->references('nv_ma')->on('cusc_nhan_vien') //cột nv_ma trong bảng cusc_nhan_vien
                ->onDelete('CASCADE') //các lựa chọn khi xoá và cập nhật
                ->onUpdate('CASCADE'); //không có bảng cha khi bảng con đang tham chiếu
                
            $table->foreign('vc_ma') //cột vc_ma trong bảng cusc_don_hang
                ->references('vc_ma')->on('cusc_van_chuyen') //cột nv_ma trong bảng cusc_van_chuyen
                ->onDelete('CASCADE') //các lựa chọn khi xoá và cập nhật
                ->onUpdate('CASCADE'); //không có bảng cha khi bảng con đang tham chiếu    
                
            $table->foreign('tt_ma') //cột tt_ma trong bảng cusc_don_hang
                ->references('tt_ma')->on('cusc_thanh_toan') //cột nv_ma trong bảng cusc_van_chuyen
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
        Schema::dropIfExists('cusc_don_hang');
    }
}
