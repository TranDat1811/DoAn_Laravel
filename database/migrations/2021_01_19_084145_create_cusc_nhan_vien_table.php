<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCuscNhanVienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_nhan_vien', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigInteger('nv_ma')->autoIncrement()->comment('Mã nhân viên');
            $table->string('nv_taiKhoan', 191)->comment('Tài khoản đăng nhập của nhân viên');
            $table->string('nv_matKhau', 500)->comment('Mật khẩu đăng nhập của nhân viên');
            $table->string('nv_hoTen', 255)->comment('Họ tên của nhân viên');
            $table->tinyInteger('nv_gioiTinh')->comment('Giới tính của nhân viên');
            $table->string('nv_email', 191)->comment('Email của nhân viên');
            $table->dateTime('nv_ngaySinh')->comment('Ngày sinh của nhân viên');
            $table->string('nv_hinhDaiDien', 500)->comment('Hình đại diện của nhân viên');
            $table->bigInteger('q_ma')->comment('Mã quyền: 1-Giám đốc, 2-Quản trị, 3-Quản lý kho, 4-Kế toán, 5-Nhân viên bán hàng, 6-Nhân viên giao hàng');
            $table->string('nv_dienThoai', 25)->comment('Số điện thoại của nhân viên');
            $table->string('nv_diaChi', 500)->comment('Địa chỉ 1 của nhân viên');
            $table->string('nv_ghiNhoDangNhap', 255)->comment('Ghi nhớ đăng nhập của nhân viên');
            $table->timestamp('nv_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo nhân viên');
            $table->timestamp('nv_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật nhân viên gần nhất');
            $table->tinyInteger('nv_trangThai')->default('2')->comment('Trạng thái # Trạng thái nhân viên: 1-khóa, 2-khả dụng');
        
            $table->unique(['nv_taiKhoan', 'nv_email', 'nv_dienThoai']);
            $table->foreign('q_ma')
                ->references('q_ma')->on('cusc_quyen')
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
        Schema::dropIfExists('cusc_nhan_vien');
    }
}
