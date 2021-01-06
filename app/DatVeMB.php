<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatVeMB extends Model
{
    protected $table = 'datvembs';
    protected $fillable = [
        'thoigiandat',
        'sdt_goilen',
        'sdt_lienhe',
        'soluong_nguoilon',
        'soluong_treem',
        'soluong_embe',
        'loaive',
        'madatcho',
        'taikhoanthanhtoan',
        'tenkhachhang',
        'tinhtrangve',
        'thongtinkhac',
        'lichsutraodoi',
        'ketqua',
        'hangbay_id',
        'user_id',
        
    ];
    
    
    public function HangBay()
    {
        return $this->belongsTo('App\HangBay','hangbay_id','id');
    }
    public function User()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
   
}
