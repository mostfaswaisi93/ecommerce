<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class State extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $table        = 'states';
    protected $fillable     = ['name', 'country_id', 'city_id', 'enabled'];
    protected $appends      = ['name_trans'];
    public $translatable    = ['name'];

    public function country_id()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    public function city_id()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
}
