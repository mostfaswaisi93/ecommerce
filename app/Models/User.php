<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table    = 'users';
    protected $fillable = ['name', 'email', 'image', 'enabled', 'password'];
    protected $appends  = ['image_path'];
    protected $hidden   = ['password', 'remember_token'];
    protected $casts    = ['email_verified_at' => 'datetime', 'created_at' => 'date:Y-m-d'];
    protected $dates    = ['created_at', 'updated_at', 'deleted_at'];

    public function getNameAttribute($value)
    {
        $word = str_replace('_', ' ', $value);
        return ucwords($word);
    }

    public function getImagePathAttribute()
    {
        return asset('images/users/' . $this->image);
    }
}
