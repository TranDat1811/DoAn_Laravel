<?php

use Illuminate\Database\Seeder;

class XuatXuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list=[];

        $type = ['Mỹ', 'Trung Quốc', 'Hàn Quốc', 'Việt Nam', 'Nhật Bản'];

        sort($type);

        $today = new DateTime('2019-01-01 08:00:00');

        for($i=1; $i<=count($type); $i++){
            array_push($list, [
                'xx_ma' => $i,
                'xx_ten' => $type[$i-1],
                'xx_taoMoi' => $today ->format('Y-m-d H:i:s'),
                'xx_capNhat' => $today ->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('cusc_xuat_xu')->insert($list);
    }
}
