<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TemperatureZone;

class TemperatureZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TemperatureZone::create([
            'name' => 'Холодильная камера',
            'min_temp' => 0.00,
            'max_temp' => 6.00,
            'description' => 'Для скоропортящихся продуктов',
        ]);

        TemperatureZone::create([
            'name' => 'Морозильная камера',
            'min_temp' => -25.00,
            'max_temp' => -15.00,
            'description' => 'Для замороженных продуктов',
        ]);

        TemperatureZone::create([
            'name' => 'Овощной отсек',
            'min_temp' => 4.00,
            'max_temp' => 10.00,
            'description' => 'Для овощей и фруктов',
        ]);

        TemperatureZone::create([
            'name' => 'Сухое хранение',
            'min_temp' => 15.00,
            'max_temp' => 25.00,
            'description' => 'Для бакалеи, круп, консервов',
        ]);
    }
}
