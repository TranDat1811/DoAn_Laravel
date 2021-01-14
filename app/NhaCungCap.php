<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    //
    const     CREATED_AT    = 'ncc_taoMoi';
    const     UPDATED_AT    = 'ncc_capNhat';

    protected $table        = 'cusc_nha_cung_cap';
    protected $fillable     = ['ncc_ma', 'ncc_ten', 'ncc_taoMoi', 'ncc_capNhat', 'ncc_trangThai'];
    protected $guarded      = ['id'];

    protected $primaryKey   = 'id';

    protected $dates        = ['ncc_taoMoi', 'ncc_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
