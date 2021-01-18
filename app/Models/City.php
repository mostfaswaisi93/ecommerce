<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends BaseModel
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = [
        'city_name_ar',
        'city_name_en',
        'country_id',
    ];

    public function country_id()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
}
