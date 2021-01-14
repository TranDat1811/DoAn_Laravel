<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscKhachHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_khach_hang', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigInteger('id')->autoIncrement()->comment('STT khách hàng');
            $table->string('kh_taikhoan', 191)->comment('Tài khoản đăng nhập của khách hàng');
            $table->string('kh_matkhau', 500)->comment('Mật khẩu đăng nhập của khách hàng');
            $table->string('kh_ho', 255)->comment('Họ của khách hàng');
            $table->string('kh_ten', 255)->comment('Tên của khách hàng');
            $table->tinyInteger('kh_gioitinh')->comment('Giới tính của khách hàng');
            $table->string('kh_email', 191)->comment('Email của khách hàng');
            $table->dateTime('kh_ngaysinh')->comment('Ngày sinh của khách hàng');
            $table->string('kh_hinhdaidien', 500)->comment('Hình đại diện của khách hàng');
            $table->string('kh_ma', 255)->comment('Mã số của khách hàng');
            $table->string('kh_congty', 255)->comment('Công ty của khách hàng');
            $table->string('kh_sodienthoai', 25)->comment('Số điện thoại của khách hàng');
            $table->string('kh_diachi_thanhtoan', 500)->comment('Địa chỉ tính tiền của khách hàng');
            $table->string('kh_diachi_giaohang', 500)->comment('Địa chỉ giao hàng của khách hàng');
            $table->string('kh_thanhpho', 255)->comment('Thành phố của khách hàng');
            $table->string('kh_huyen', 255)->comment('Huyện của khách hàng');
            $table->string('kh_ma_buudien', 15)->comment('Mã bưu điện của khách hàng');
            $table->string('kh_quocgia', 255)->comment('Quốc gia của khách hàng');
            $table->string('kh_ghinho_dangnhap', 255)->comment('Ghi nhớ đăng nhập của khách hàng');
            $table->string('kh_ma_kichhoat', 255)->comment('Mã kích hoạt của khách hàng');
            $table->timestamp('kh_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo khách hàng');
            $table->timestamp('kh_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật khách hàng gần nhất');
            $table->tinyInteger('kh_trangThai')->default('2')->comment('Trạng thái # Trạng thái khách hàng: 1-khóa, 2-khả dụng');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_khach_hang');
    }
}
