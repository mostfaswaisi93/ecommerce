<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    use HasFactory;

    protected $table    = 'roles';
    protected $fillable = ['name'];
    protected $appends  = ['users_count'];
    protected $casts    = ['created_at' => 'date:Y-m-d'];
    protected $dates    = ['created_at', 'updated_at'];

    public function getNameAttribute($value)
    {
        $word = str_replace('_', ' ', $value);
        return ucwords($word);
    }

    public function getUsersCountAttribute($val)
    {
        // Users Count
        $users = User::role('super_admin')->count();

        $roles = Role::pluck('name');
        foreach ($roles as $role) {
            $userCount = User::whereHas('roles', function ($query) use ($role) {
                $query->where('name', $role);
            })->count();
        }
        return $users;
    }
}
