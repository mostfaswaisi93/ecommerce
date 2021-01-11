<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends BaseModel
{
    use HasFactory;

    protected $table = 'countries';

    protected $fillable = [
        'country_name_ar',
        'country_name_en',
        'mob',
        'code',
        'logo',
    ];
}
