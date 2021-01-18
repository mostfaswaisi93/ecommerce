<?php

namespace Database\Seeders;

use App\Models\TradeMark;
use Illuminate\Database\Seeder;

class TradeMarksTableSeeder extends Seeder
{
    public function run()
    {
        $trade_mark['name'] = [
            'ar' => 'الاسم في العربي',
            'en' => 'Name in English'
        ];

        TradeMark::create($trade_mark);
    }
}
