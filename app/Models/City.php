<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class City extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $table        = 'cities';
    protected $fillable     = ['name', 'country_id', 'enabled'];
    protected $appends      = ['name_trans'];
    public $translatable    = ['name'];

    public function country_id()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
}
