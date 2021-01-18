<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    use SoftDeletes;

    public $timestamps  = true;
    protected $casts    = ['created_at' => 'date:Y-m-d', 'updated_at' => 'date:Y-m-d H:i'];
    protected $dates    = ['created_at', 'updated_at', 'deleted_at'];

    // Unicode DB to Arabic
    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    // get Name Translatable
    public function getNameTransAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->getTranslation('name', 'ar');
        } else {
            return $this->getTranslation('name', 'en');
        }
    }

    public function scopeActive($query)
    {
        return $query->where('enabled', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('enabled', 0);
    }

    public function getActiveAttribute()
    {
        return $this->active == 1 ? "{{ trans('admin.active') }}" : "{{ trans('admin.inactive') }}";
    }
}
