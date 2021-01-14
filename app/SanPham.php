<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    //
    const     CREATED_AT    = 'sp_taoMoi';
    const     UPDATED_AT    = 'sp_capNhat';

    protected $table        = 'cusc_san_pham';
    protected $fillable     = ['sp_ma', 'sp_ten', 'sp_hinhanh', 'sp_mota_ngan', 'sp_mota', 'sp_gia_tieuchuan',
                                'sp_gia_niemyet', 'sp_soluong', 'sp_ngungsanxuat', 'sp_noibat', 'sp_moi',
                                 'l_id', 'ncc_id', 'sp_taoMoi', 'sp_capNhat', 'sp_trangThai'];
    protected $guarded      = ['id'];

    protected $primaryKey   = 'id';

    protected $dates        = ['sp_taoMoi', 'sp_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
