<?php

use Illuminate\Database\Seeder;

class QuyenTableSeeder extends Seeder
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

        $type = ['Giám đốc', 'Quản trị', 'Quản lí kho', 'Kế toán', 'Nhân viên bán hàng', 
                'Nhân viên giao hàng'];

        sort($type);

        $today = new DateTime();

        for($i=1; $i<=count($type); $i++){
            array_push($list, [
                'q_ma' => $i,
                'q_ten' => $type[$i-1],
                'q_dienGiai' => "Diễn giải $i",
                'q_taoMoi' => $today ->format('Y-m-d H:i:s'),
                'q_capNhat' => $today ->format('Y-m-d H:i:s'),
                'q_trangThai' => 2

            ]);
        }
        DB::table('cusc_quyen')->insert($list);
    }
}
