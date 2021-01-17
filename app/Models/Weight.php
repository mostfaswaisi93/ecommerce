<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Weight extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $table        = 'weights';
    protected $fillable     = ['name', 'enabled'];
    protected $appends      = ['name_trans'];
    public $translatable    = ['name'];

    public function getNameTransAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->getTranslation('name', 'ar');
        } else {
            return $this->getTranslation('name', 'en');
        }
    }
}
