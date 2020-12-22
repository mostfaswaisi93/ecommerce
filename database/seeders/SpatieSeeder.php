<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Config;

class SpatieSeeder extends Seeder
{
    public function run()
    {
        $this->truncateSpatieTables();

        $config = config('spatie_seeder.roles_structure');
        $mapPermission = collect(config('spatie_seeder.permissions_map'));

        foreach ($config as $key => $modules) {

            // Create a new role
            $role = Role::firstOrCreate([
                'name' => $key,
                'guard_name' => ucwords(str_replace('_', ' ', $key))
            ]);
            $permissions = [];

            $this->command->info('Creating Role ' . strtoupper($key));

            // Reading role permission modules
            foreach ($modules as $module => $value) {

                foreach (explode(',', $value) as $p => $perm) {

                    $permissionValue = $mapPermission->get($perm);

                    $permissions[] = Permission::firstOrCreate([
                        'name' => $permissionValue . '_' . $module,
                        'guard_name' => ucfirst($permissionValue) . ' ' . ucfirst($module)
                    ])->id;

                    $this->command->info('Creating Permission to ' . $permissionValue . ' for ' . $module);
                }
            }

            // Attach all permissions to the role
            $role->permissions()->sync($permissions);

            if (Config::get('spatie_seeder.create_users')) {
                $this->command->info("Creating '{$key}' user");
                // Create default user for each role
                $user = User::create([
                    'name' => ucwords(str_replace('_', ' ', $key)),
                    'email' => $key . '@app.com',
                    'password' => bcrypt('password')
                ]);
                $user->attachRole($role);
            }
        }
    }

    public function truncateSpatieTables()
    {
        $this->command->info('Truncating User, Role and Permission tables');
        Schema::disableForeignKeyConstraints();
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        if (Config::get('spatie_seeder.truncate_tables')) {
            Role::truncate();
            Permission::truncate();
        }
        if (Config::get('spatie_seeder.truncate_tables') && Config::get('spatie_seeder.create_users')) {
            User::truncate();
        }
        Schema::enableForeignKeyConstraints();
    }
}
