<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherData extends Model
{
    use HasFactory;

    protected $table    = 'other_datas';
    protected $fillable = ['product_id', 'data_key', 'data_value'];
}
