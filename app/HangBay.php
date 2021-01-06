<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class HangBay extends Model
{
    use Sluggable;

    protected $table = 'hangbays';
    protected $fillable = [
        'name',
        'slug',
        'icon',
        'order',
        
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function DatVeMB()
    {
        return $this->hasMany('App\DatVeMB','hangbay_id','id');
    }
   
}
