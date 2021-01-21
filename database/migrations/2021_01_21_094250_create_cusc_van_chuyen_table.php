<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscVanChuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_van_chuyen', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigInteger('vc_ma')->autoIncrement()->comment('Mã dịch vụ giao hàng');
            $table->string('vc_ten')->comment('Tên dịch vụ #Tên dịch vụ giao hàng');
            $table->string('vc_chiPhi')->comment('Phí giao hàng #Phí giao hàng');
            $table->text('vc_dienGiai')->comment('Thông tin #Thông tin về dịch vụ giao hàng');
            $table->timestamp('vc_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo dịch vụ giao hàng');
            $table->timestamp('vc_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật dịch vụ giao hàng gần nhất');
            $table->tinyInteger('vc_trangThai')->default('2')->comment('Trạng thái # Trạng thái dịch vụ giao hàng: 1-khóa, 2-khả dụng');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_van_chuyen');
    }
}
