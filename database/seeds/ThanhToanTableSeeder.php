<?php

use Illuminate\Database\Seeder;

class ThanhToanTableSeeder extends Seeder
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

        $type = ['Tiền mặt', 'Chuyển khoản ngân hàng', 'Ví MOMO', 'Ví AirPay', 'VISA'];

        sort($type);

        $today = new DateTime();

        for($i=1; $i<=count($type); $i++){
            array_push($list, [
                'tt_ma' => $i,
                'tt_ten' => $type[$i-1],
                'tt_dienGiai' => $type[$i-1],
                'tt_taoMoi' => $today ->format('Y-m-d H:i:s'),
                'tt_capNhat' => $today ->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('cusc_thanh_toan')->insert($list);
    }
}
