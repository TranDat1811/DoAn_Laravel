<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XuatXu extends Model
{
    const     CREATED_AT    = 'xx_taoMoi';
    const     UPDATED_AT    = 'xx_capNhat';

    protected $table        = 'cusc_xuat_xu';
    protected $fillable     = ['xx_ma', 'xx_ten', 'xx_taoMoi', 'xx_capNhat', 'xx_trangThai'];
    protected $guarded      = ['id'];

    protected $primaryKey   = 'id';

    protected $dates        = ['xx_taoMoi', 'xx_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

}
