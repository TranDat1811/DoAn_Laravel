<?php

use Illuminate\Database\Seeder;

class LoaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list=[];

        $type = ['IPHONE', 'SAMSUNG', 'VSMART', 'OPPO', 'XIAOMI', 
                'VIVO', "REALME", "HUAWEI", "NOKIA"];

        sort($type);

        $today = new DateTime();

        for($i=1; $i<=count($type); $i++){
            array_push($list, [
                'l_ma' => $i,
                'l_ten' => $type[$i-1],
                'l_taoMoi' => $today ->format('Y-m-d H:i:s'),
                'l_capNhat' => $today ->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('cusc_loai')->insert($list);
    }
}
