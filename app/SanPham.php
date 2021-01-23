<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    //
    const     CREATED_AT    = 'sp_taoMoi';
    const     UPDATED_AT    = 'sp_capNhat';

    protected $table        = 'cusc_san_pham';
    protected $fillable     = ['sp_ten', 'sp_hinhAnh', 'sp_moTa_ngan', 'sp_moTa', 'sp_giaNhap',
                                'sp_giaBan', 'sp_soLuong', 'sp_noiBat', 'sp_moi',
                                 'l_ma', 'ncc_ma', 'sp_taoMoi', 'sp_capNhat', 'sp_trangThai'];
    protected $guarded      = ['sp_ma'];

    protected $primaryKey   = 'sp_ma';

    protected $dates        = ['sp_taoMoi', 'sp_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
