<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shipping extends BaseModel
{
    use HasFactory;

    protected $table = 'shippings';

    protected $fillable = [
        'name_ar',
        'name_en',
        'user_id',
        'lat',
        'lng',
        'icon',
    ];

    public function user_id()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
