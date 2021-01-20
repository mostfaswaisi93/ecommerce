<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table        = 'products';
    protected $fillable     = [
        'title', 'photo', 'content', 'department_id', 'trade_id', 'manu_id', 'color_id',
        'size_id', 'currency_id', 'price', 'stock', 'start_at', 'end_at', 'start_offer_at',
        'end_offer_at', 'price_offer', 'other_data', 'weight', 'weight_id', 'status',
        'reason', 'enabled'
    ];

    public function related()
    {
        return $this->hasMany(RelatedProudct::class, 'product_id', 'id');
    }

    public function mall_product()
    {
        return $this->hasMany(MallProduct::class, 'product_id', 'id');
    }

    public function other_data()
    {
        return $this->hasMany(OtherData::class, 'product_id', 'id');
    }

    public function malls()
    {
        return $this->hasMany(MallProduct::class, 'product_id', 'id');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'relation_id', 'id')->where('file_type', 'product');
    }
}
