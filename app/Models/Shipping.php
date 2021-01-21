<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Shipping extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $table        = 'shippings';
    protected $fillable     = ['name', 'user_id', 'lat', 'lng', 'icon', 'enabled'];
    protected $appends      = ['icon_path', 'name_trans'];
    public $translatable    = ['name'];

    public function user_id()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getIconPathAttribute()
    {
        return asset('images/shippings/' . $this->icon);
    }
}
