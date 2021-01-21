<?php

use Illuminate\Database\Seeder;

class DonHangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $list=[];
        $faker    = Faker\Factory::create('vi_VN');
        $today = new DateTime();

        for($i=1; $i<=10; $i++){
            array_push($list, [
                'dh_ma' => $i,
                'kh_ma' => $faker->numberBetween(1, 30),
                'dh_thoiGianDatHang' =>$today ->format('Y-m-d H:i:s'),
                'dh_thoiGianNhanHang' => $today ->format('Y-m-d H:i:s'),
                'dh_nguoiNhan' => "Người nhận $i",
                'dh_diaChi' => "CẦN THƠ",
                'dh_dienThoai' => "0123214214",
                'dh_nguoiGui' => "HIHI SHOP",
                'dh_loiChuc' => "Chúc mừng !!!",
                'dh_daThanhToan' => 0,
                'nv_xuLy' => $faker->numberBetween(1, 5),
                'dh_ngayXuLy' => $today ->format('Y-m-d H:i:s'),
                'nv_giaoHang' => $faker->numberBetween(1, 5),
                'dh_ngayLapPhieuGiao' => $today ->format('Y-m-d H:i:s'),
                'dh_ngayGiaoHang' => $today ->format('Y-m-d H:i:s'),
                'dh_taoMoi' => $today ->format('Y-m-d H:i:s'),
                'dh_capNhat' => $today ->format('Y-m-d H:i:s'),
                'dh_trangThai' => 2,
                'vc_ma' => 1,
                'tt_ma' =>  1
            ]);
        }
        DB::table('cusc_don_hang')->insert($list);
    }
}
