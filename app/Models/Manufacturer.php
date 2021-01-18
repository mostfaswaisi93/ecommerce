<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Manufacturer extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $table        = 'manufacturers';
    protected $fillable     = [
        'name',
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
        'enabled'
    ];
    protected $appends      = ['name_trans'];
    public $translatable    = ['name'];
}
