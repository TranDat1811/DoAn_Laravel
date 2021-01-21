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
                'sp_hinhAnh' => "sp-$i.jpg",
                'sp_moTa_ngan' => "Mô tả ngắn sản phẩm-$i",
                'sp_moTa' => "Mô tả sản phẩm $i",
                'sp_giaNhap' => $faker->randomFloat(2000000, 50000, 1999999),
                'sp_giaBan' => $faker->randomFloat(2000000, 50000, 1999999),
                'sp_soLuong' => $faker->numberBetween(50, 100),
                'sp_noiBat' => 1,
                'sp_moi' => 1,
                'l_ma' => $faker->numberBetween(1, 9),
                'ncc_ma' => $faker->numberBetween(1, 9),
                'sp_taoMoi' => $today ->format('Y-m-d H:i:s'),
                'sp_capNhat' => $today ->format('Y-m-d H:i:s'),
                'sp_trangThai' => $faker->numberBetween(1, 2)
            ]);
        }
        DB::table('cusc_san_pham')->insert($list);
    }
}
