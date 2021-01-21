<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class NhanVienTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $list = [];
        $uFN = new VnFullname();
        $uPI = new VnPersonalInfo();

        //1-Giám đốc, 2-Quản trị, 3-Quản lý kho, 4-Kế toán, 5-Nhân viên bán hàng, 6-Nhân viên giao hàng
        $roles     = 6;
        $employees = [1,   1,  1,  1,  2,  2];
        $ages      = [30, 25, 22, 20, 18, 18];
        $genders   = [VnBase::VnFemale, VnBase::VnMale, VnBase::VnMale, VnBase::VnFemale, VnBase::VnFemale, VnBase::VnFemale];
    
        $today = new DateTime();

        

        for ($i=0, $count = 1; $i < $roles; $i++) {
            for ($j=0; $j < $employees[$i]; $j++, $count++) { 
                $gender   = $genders[$i];
                $name     = $uFN->FullName($gender);
                $age      = $uPI->Age($ages[$i]);
                $birthYear= $uPI->BirthYearValue($age);
                $birthdate= $uPI->Birthdate($birthYear);
                $username = $uPI->Username($name, "", "", "", VnBase::VnLowerCase, VnBase::VnTrimShorthand, VnBase::VnTrue);
                $email    = "$username@hihi.com";
                $password = bcrypt($username."@".$birthYear);
                $phone    = $uPI->Mobile("", VnBase::VnFalse);
                $address  = $uPI->Address();

                array_push($list, [
                    'nv_ma'        => $count,
                    'nv_taiKhoan'  => $username,
                    'nv_matKhau'   => $password,
                    'nv_hoTen'     => $name,
                    'nv_gioiTinh'  => $gender == VnBase::VnMale,
                    'nv_email'     => $email,
                    'nv_ngaySinh'  => $birthdate["birthdate"],
                    'nv_hinhDaiDien' => "nhanvien-$i.jpg",
                    'q_ma'         => $i+1,
                    'nv_dienThoai' => $phone,
                    'nv_diaChi'    => $address,
                    'nv_ghiNhoDangNhap' => 0,
                    'nv_taoMoi'    => $today->format('Y-m-d H:i:s'),
                    'nv_capNhat'   => $today->format('Y-m-d H:i:s'),
                    
                ]);
                
            }
        }
        DB::table('cusc_nhan_vien')->insert($list);
    }
    
}
