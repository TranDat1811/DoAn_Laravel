<?php

use Illuminate\Database\Seeder;

class NhaCungCapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list=[];

        $type = ['APPLE', 'SAMSUNG VN', 'VINGROUP', 'OPPO VN', 'XIAOMI VN', 
                'VIVO VN', "REALME VN", "HUAWEI VN", "NOKIA VN"];

        sort($type);

        $today = new DateTime();

        for($i=1; $i<=count($type); $i++){
            array_push($list, [
                'ncc_ma' => $i,
                'ncc_ten' => $type[$i-1],
                'ncc_moTa' => "Mô tả $i",
                'ncc_hinhAnh' => "ncc-$i.jpg",
                'ncc_taoMoi' => $today ->format('Y-m-d H:i:s'),
                'ncc_capNhat' => $today ->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('cusc_nha_cung_cap')->insert($list);
    }
}
