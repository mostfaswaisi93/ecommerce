<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name'          => 'super_admin',
            'email'         => 'super@admin.com',
            'password'      => bcrypt('password'),
            'created_at'    => date('Y-m-d'),
            'updated_at'    => date('Y-m-d'),
        ]);

        $role = Spatie\Permission\Models\Role::all()->pluck('name');
        $role = Spatie\Permission\Models\Role::where('id', 1)->get();
        $user->assignRole($role);
        // $user = User::find(1);
        // $user->hasRole('super_admin');
        // $user->assignRole('super_admin');

    }
}
