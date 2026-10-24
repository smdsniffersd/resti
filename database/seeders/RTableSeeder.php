<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RTable;

class RTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tables = [

            ['name' => 'Стол 1', 'places' => 2, 'type' => 'standard'],
            ['name' => 'Стол 2', 'places' => 2, 'type' => 'standard'],
            ['name' => 'Стол 3', 'places' => 4, 'type' => 'standard'],
            ['name' => 'Стол 4', 'places' => 4, 'type' => 'standard'],
            ['name' => 'Стол 5', 'places' => 6, 'type' => 'family'],
            ['name' => 'Стол 6', 'places' => 6, 'type' => 'family'],
            ['name' => 'Стол 7', 'places' => 8, 'type' => 'banquet'],
            ['name' => 'VIP 1',  'places' => 4, 'type' => 'vip'],
            ['name' => 'VIP 2',  'places' => 6, 'type' => 'vip'],
            ['name' => 'Бар 1',  'places' => 1, 'type' => 'bar'],

        ];
        foreach($tables as $table){
            RTable::create($table);
        }
    }
}
