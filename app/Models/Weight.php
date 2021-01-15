<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Weight extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $table    = 'weights';
    public $translatable = ['name'];
    protected $fillable = ['name', 'enabled'];
}
