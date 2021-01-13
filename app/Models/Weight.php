<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Weight extends BaseModel
{
    use HasFactory;

    protected $table    = 'weights';

    protected $fillable = [
        'name_ar',
        'name_en',
    ];
}
