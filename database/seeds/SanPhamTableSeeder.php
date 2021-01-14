<?php

use Illuminate\Database\Seeder;

class SanPhamTableSeeder extends Seeder
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

        for($i=1; $i<=30; $i++){
            array_push($list, [
                'sp_ma' => $i,
                'sp_ten' => "sp_ten-$i",
                'sp_hinhanh' => "sp-$i.jpg",
                'sp_mota_ngan' => "Mô tả ngắn sản phẩm-$i",
                'sp_mota' => "Mô tả sản phẩm $i",
                'sp_gia_tieuchuan' => $faker->randomFloat(2000000, 50000, 1999999),
                'sp_gia_niemyet' => $faker->randomFloat(2000000, 50000, 1999999),
                'sp_soluong' => $faker->numberBetween(50, 100),
                'sp_ngungsanxuat'=> 0, //còn đang sản xuất
                'sp_noibat' => 1,
                'sp_moi' => 1,
                'l_id' => $faker->numberBetween(1, 9),
                'ncc_id' => $faker->numberBetween(1, 9),
                'sp_hinhanh' => "sp-$i.jpg",
                'sp_taoMoi' => $today ->format('Y-m-d H:i:s'),
                'sp_capNhat' => $today ->format('Y-m-d H:i:s'),
                'sp_trangThai' => $faker->numberBetween(1, 2)
            ]);
        }
        DB::table('cusc_san_pham')->insert($list);
    }
}
