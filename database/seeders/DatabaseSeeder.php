<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        // $this->call(ContactsTableSeeder::class);
        // $this->call(CountriesTableSeeder::class);
        // $this->call(CitiesTableSeeder::class);
    }
}
