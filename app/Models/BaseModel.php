<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    use SoftDeletes;

    public $timestamps  = true;
    protected $casts    = ['created_at' => 'date:Y-m-d'];
    protected $dates    = ['created_at', 'updated_at', 'deleted_at'];

    public function scopeActive($query)
    {
        return $query->where('enabled', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('enabled', 0);
    }
}
