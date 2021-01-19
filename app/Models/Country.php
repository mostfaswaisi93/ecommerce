<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Country extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $table        = 'countries';
    protected $fillable     = ['name', 'mob', 'code', 'logo', 'enabled'];
    protected $appends      = ['name_trans'];
    public $translatable    = ['name'];

    // get Currency Translatable
    public function getCurrencyTransAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->getTranslation('currency', 'ar');
        } else {
            return $this->getTranslation('currency', 'en');
        }
    }
}
