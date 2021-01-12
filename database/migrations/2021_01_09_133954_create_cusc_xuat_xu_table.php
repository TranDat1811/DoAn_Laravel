<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscXuatXuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_xuat_xu', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->integer('xx_ma')->autoIncrement()->comment('Mã xuất xứ');
            $table->string('xx_ten')->unique()->comment('Xuất xứ #Xuất xứ của sản phẩm');
            $table->timestamp('xx_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo xuất xứ');
            $table->timestamp('xx_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật xuất xứ sản phẩm gần nhất');
            $table->tinyInteger('xx_trangThai')->default('2')->comment('Trạng thái # Trạng thái xuất xứ sản phẩm: 1-khóa, 2-khả dụng');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_xuat_xu');
    }
}
