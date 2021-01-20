<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Mall extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $table        = 'malls';
    protected $fillable     = [
        'name', 'email', 'mobile', 'facebook', 'country_id', 'twitter', 'address',
        'website', 'contact_name', 'lat', 'lng', 'icon', 'enabled'
    ];
    protected $appends      = ['name_trans'];
    public $translatable    = ['name'];

    public function country_id()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
}
