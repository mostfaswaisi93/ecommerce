<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'mostfaswaisi93',
            'email' => 'mostfaswaisi93@gmail.com',
            'password' => bcrypt('Password'),
            'roles_name' => ["owner"],
            'status' => 'مفعل',
        ]);

        $role = Role::create(['name' => 'owner']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);




        // $user = User::create([
        //     'name'          => 'super',
        //     'username'      => 'super_admin',
        //     'email'         => 'super@admin.com',
        //     'password'      => bcrypt('password'),
        //     'created_at'    => date('Y-m-d'),
        //     'updated_at'    => date('Y-m-d')
        // ]);

        // $user->attachRole('super_admin');
    }
}
