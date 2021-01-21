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
            $table->bigInteger('kh_ma')->autoIncrement()->comment('Mã khách hàng');
            $table->string('kh_taiKhoan', 191)->comment('Tài khoản đăng nhập của khách hàng');
            $table->string('kh_matKhau', 500)->comment('Mật khẩu đăng nhập của khách hàng');
            $table->string('kh_hoTen', 255)->comment('Họ tên của khách hàng');
            $table->tinyInteger('kh_gioiTinh')->comment('Giới tính của khách hàng');
            $table->string('kh_email', 191)->comment('Email của khách hàng');
            $table->dateTime('kh_ngaySinh')->comment('Ngày sinh của khách hàng');
            $table->string('kh_hinhDaiDien', 500)->comment('Hình đại diện của khách hàng');
            $table->string('kh_dienThoai', 25)->comment('Số điện thoại của khách hàng');
            $table->string('kh_diaChi', 500)->comment('Địa chỉ của khách hàng');
            $table->string('kh_ghiNhoDangNhap', 255)->comment('Ghi nhớ đăng nhập của khách hàng');
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
