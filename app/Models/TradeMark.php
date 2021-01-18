<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class TradeMark extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $table        = 'trade_marks';
    protected $fillable     = ['name', 'logo', 'enabled'];
    protected $appends      = ['logo_path', 'name_trans'];
    public $translatable    = ['name'];

    public function getLogoPathAttribute()
    {
        return asset('images/trade_marks/' . $this->logo);
    }
}
