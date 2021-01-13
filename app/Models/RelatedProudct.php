<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedProudct extends Model
{
    use HasFactory;

    protected $table    = 'related_proudcts';

    protected $fillable = [
        'product_id',
        'related_product',
    ];

    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'related_product');
    }
}
