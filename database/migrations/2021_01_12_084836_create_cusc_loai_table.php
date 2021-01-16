<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscLoaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_loai', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id')->autoIncrement()->comment('STT');
            $table->tinyInteger('l_ma')->comment('Mã loại sản phẩm');
            $table->string('l_ten', 50)->comment('Tên loại #Tên loại sản phẩm');
            $table->text('l_mota')->comment('Mô tả về nhà loại sản phẩm #Mô tả về loại sản phẩm ');
            $table->text('l_hinhanh')->comment('Hình ảnh về loại sản phẩm #Hình ảnh về loại sản phẩm');
            $table->timestamp('l_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo loại sản phẩm');
            $table->timestamp('l_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật loại sản phẩm gần nhất');
            $table->tinyInteger('l_trangThai')->default('2')->comment('Trạng thái # Trạng thái loại sản phẩm: 1-khóa, 2-khả dụng');

            $table->unique(['l_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_loai');
    }
}
