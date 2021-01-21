<?php

use Illuminate\Database\Seeder;

class ChiTietDonHangTableSeeder extends Seeder
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
                'dh_ma' => $faker->numberBetween(1, 10),
                'sp_ma' => $faker->numberBetween(1, 30),
                'ctdh_soLuong' => $faker->numberBetween(1, 10),
                'ctdh_donGia' => $faker->randomFloat(2000000, 50000, 1999999)
            ]);
        }
        DB::table('cusc_chi_tiet_don_hang')->insert($list);
    }
}
