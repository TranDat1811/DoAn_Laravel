<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_san_pham', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id')->autoIncrement()->comment('STT');
            $table->string('sp_ma',25)->comment('Mã sản phẩm');
            $table->string('sp_ten', 50)->comment('Tên sản phẩm #Tên sản phẩm');
            $table->text('sp_hinhanh')->comment('Hình đại diện sản phẩm #Hình đại diện sản phẩm');
            $table->text('sp_mota_ngan')->comment('Mô tả ngắn về sản phẩm #Mô tả ngắn về sản phẩm');
            $table->text('sp_mota')->comment('Mô tả về sản phẩm #Mô tả về sản phẩm');
            $table->decimal('sp_gia_tieuchuan', 19, 4)->comment('Giá tiêu chuẩn sản phẩm #Giá tiêu chuẩn sản phẩm');
            $table->decimal('sp_gia_niemyet', 19, 4)->comment('Giá niêm yết sản phẩm #Giá niêm yết sản phẩm');
            $table->string('sp_soluong', 50)->comment('Số lượng mỗi sản phẩm #Số lượng mỗi sản phẩm');
            $table->tinyInteger('sp_ngungsanxuat')->comment('Sản phẩm đã ngừng sản xuất ');
            $table->boolean('sp_noibat')->default(true)->comment('Sản phẩm nổi bật');
            $table->boolean('sp_moi')->default(true)->comment('Sản phẩm mới');
            $table->bigInteger('l_id')->comment('ID loại sản phẩm');
            $table->bigInteger('ncc_id')->comment('ID nhà cung cấp sản phẩm');
            $table->timestamp('sp_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo sản phẩm');
            $table->timestamp('sp_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật sản phẩm gần nhất');
            $table->tinyInteger('sp_trangThai')->default('2')->comment('Trạng thái # Trạng thái sản phẩm: 1-khóa, 2-khả dụng');
        
            $table->foreign('l_id') //cột l_id trong bảng sản phẩm
                ->references('id')->on('cusc_loai') //cột id trong bảng loại
                ->onDelete('CASCADE') //các lựa chọn khi xoá và cập nhật
                ->onUpdate('CASCADE'); //không có bảng cha khi bảng con đang tham chiếu

            $table->foreign('ncc_id') //cột ncc_id trong bảng sản phẩm
                ->references('id')->on('cusc_nha_cung_cap') //cột id trong bảng nhà cung cấp
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
        Schema::dropIfExists('cusc_san_pham');
    }
}
