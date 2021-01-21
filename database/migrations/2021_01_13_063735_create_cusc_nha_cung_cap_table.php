<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscNhaCungCapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_nha_cung_cap', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('ncc_ma')->autoIncrement()->comment('Mã nhà cung cấp');
            $table->string('ncc_ten', 50)->comment('Tên nhà cung cấp #Tên nhà cung cấp');
            $table->text('ncc_moTa')->comment('Mô tả về nhà cung cấp #Mô tả về nhà cung cấp');
            $table->text('ncc_hinhAnh')->comment('Hình ảnh về nhà cung cấp #Hình ảnh về nhà cung cấp');
            $table->timestamp('ncc_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo nhà cung cấp');
            $table->timestamp('ncc_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật nhà cung cấp gần nhất');
            $table->tinyInteger('ncc_trangThai')->default('2')->comment('Trạng thái # Trạng thái nhà cung cấp: 1-khóa, 2-khả dụng');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_nha_cung_cap');
    }
}
