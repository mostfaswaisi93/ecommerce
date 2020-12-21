<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name'          => 'admin',
            'email'         => 'admin@admin.com',
            'password'      => bcrypt('password'),
            // 'roles_name'    => ["admin"],
            'created_at'    => date('Y-m-d'),
            'updated_at'    => date('Y-m-d'),
        ]);

        // $role = Role::create(['name' => 'admin']);

        // $permissions = Permission::pluck('id', 'id')->all();

        // $role->syncPermissions($permissions);

        // $user->assignRole([$role->id]);
    }
}
