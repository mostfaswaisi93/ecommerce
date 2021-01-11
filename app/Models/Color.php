<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends BaseModel
{
    use HasFactory;

    protected $table = 'colors';

    protected $fillable = [
        'name_ar',
        'name_en',
        'color',
    ];
}
