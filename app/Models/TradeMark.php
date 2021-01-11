<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class TradeMark extends BaseModel
{
    use HasFactory;

    protected $table = 'trade_marks';

    protected $fillable = [
        'name_ar',
        'name_en',
        'logo',
    ];
}
