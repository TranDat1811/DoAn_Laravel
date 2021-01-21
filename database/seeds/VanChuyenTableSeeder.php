<?php

use Illuminate\Database\Seeder;

class VanChuyenTableSeeder extends Seeder
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

        $type = ['Bưu điện', 'Express'];

        sort($type);

        $today = new DateTime();

        for($i=1; $i<=count($type); $i++){
            array_push($list, [
                'vc_ma' => $i,
                'vc_ten' => $type[$i-1],
                'vc_chiPhi' => 20000,
                'vc_dienGiai' => "Diễn giải $i",
                'vc_taoMoi' => $today ->format('Y-m-d H:i:s'),
                'vc_capNhat' => $today ->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('cusc_van_chuyen')->insert($list);
    }
}
