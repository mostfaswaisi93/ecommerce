<?php

namespace Database\Seeders;

use App\Models\Weight;
use Illuminate\Database\Seeder;

class WeightsTableSeeder extends Seeder
{
    public function run()
    {
        $w['name'] = [
            'ar' => '',
            'en' => ''
        ];

        Weight::create($w);

        $weights = ['Weight One', 'Weight Two', 'Weight Three'];
        foreach ($weights as $weight) {
            Weight::create([
                'ar' => ['name' => $weight],
                'en' => ['name' => $weight],
            ]);
        }
    }
}
