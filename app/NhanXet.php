<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanXet extends Model
{
    //
    const     CREATED_AT    = 'nx_taoMoi';
    const     UPDATED_AT    = 'nx_capNhat';

    protected $table        = 'cusc_nhan_xet_san_pham';
    protected $fillable     = ['sp_id', 'kh_id', 'nx_danhgia', 'nx_binhluan', 'nx_taoMoi', 'nx_capNhat'];
    protected $guarded      = ['id'];

    protected $primaryKey   = 'id';

    protected $dates        = ['nx_taoMoi', 'nx_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
