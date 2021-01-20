<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Department extends BaseModel
{
    use HasFactory, HasTranslations;

    protected $table        = 'departments';
    protected $fillable     = ['name', 'icon', 'description', 'keyword', 'parent', 'enabled'];
    protected $appends      = ['name_trans'];
    public $translatable    = ['name'];

    public function parents()
    {
        return $this->hasMany(Department::class, 'id', 'parent');
    }
}
