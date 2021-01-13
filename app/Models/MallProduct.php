<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MallProduct extends Model
{
    use HasFactory;

    protected $table    = 'mall_products';
    protected $fillable = ['product_id', 'mall_id'];

    public function mall()
    {
        return $this->hasOne('App\Models\Mall', 'id', 'mall_id');
    }
}
