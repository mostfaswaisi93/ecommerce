<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Size extends Model
{
    use HasFactory, HasTranslations;

    protected $table        = 'sizes';
    protected $fillable     = ['name', 'department_id', 'is_public', 'enabled'];
    protected $appends      = ['name_trans'];
    public $translatable    = ['name'];

    public function department_id()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
}
