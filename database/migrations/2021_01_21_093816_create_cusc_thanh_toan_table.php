<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuscThanhToanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cusc_thanh_toan', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigInteger('tt_ma')->autoIncrement()->comment('Mã phương thức thanh toán');
            $table->string('tt_ten')->comment('Tên phương thức thanh toán');
            $table->text('tt_dienGiai')->comment('Thông tin về phương thức thanh toán');
            $table->timestamp('tt_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo phương thức thanh toán');
            $table->timestamp('tt_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật phương thức thanh toán');
            $table->tinyInteger('tt_trangThai')->default('2')->comment('Trạng thái # Trạng thái phương thức thanh toán: 1-khóa, 2-khả dụng');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cusc_thanh_toan');
    }
}
