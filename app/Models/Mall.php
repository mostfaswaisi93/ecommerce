<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mall extends BaseModel
{
    use HasFactory;

    protected $table = 'malls';

    protected $fillable = [
        'name_ar',
        'name_en',
        'email',
        'mobile',
        'facebook',
        'country_id',
        'twitter',
        'address',
        'website',
        'contact_name',
        'lat',
        'lng',
        'icon',
    ];

    public function country_id()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
}
