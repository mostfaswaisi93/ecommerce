<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manufacturer extends BaseModel
{
    use HasFactory;

    protected $table = 'manufacturers';

    protected $fillable = [
        'name_ar',
        'name_en',
        'email',
        'mobile',
        'facebook',
        'twitter',
        'address',
        'website',
        'contact_name',
        'lat',
        'lng',
        'icon',
    ];
}
