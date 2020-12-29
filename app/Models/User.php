<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table    = 'users';
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'image',
        'enabled', 'password', 'last_login_at', 'last_login_ip'
    ];
    protected $appends  = ['image_path', 'full_name', 'last_login'];
    protected $hidden   = ['password', 'remember_token'];
    protected $casts    = [
        'email_verified_at' => 'datetime', 'created_at' => 'date:Y-m-d',
        'last_login_at' => 'date:Y-m-d - H:i A'
    ];
    protected $dates    = ['created_at', 'updated_at', 'deleted_at', 'last_login_at'];

    public function getLastLoginAttribute()
    {
        return Carbon::parse(Auth::user()->last_login_at)->diffForHumans(Carbon::now());
    }

    public function getNameAttribute($value)
    {
        $word = str_replace('_', ' ', $value);
        return ucwords($word);
    }

    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function getImagePathAttribute()
    {
        return asset('images/users/' . $this->image);
    }
}
