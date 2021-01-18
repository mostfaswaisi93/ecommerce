<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'department_id',
        'is_public',
    ];

    public function department_id()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
}
