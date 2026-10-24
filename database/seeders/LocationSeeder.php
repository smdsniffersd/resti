<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TemperatureZone;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cold = TemperatureZone::where('name', 'Холодильная камера')->first();
        $frozen = TemperatureZone::where('name', 'Морозильная камера')->first();
        $veg = TemperatureZone::where('name', 'Овощной отсек')->first();
        $dry = TemperatureZone::where('name', 'Сухое хранение')->first();

        $locations = [
            ['name' => 'Основной склад',      'type' => 'склад',              'temp_zone_id' => $dry->id,    'description' => 'Сухое хранение бакалеи, круп, консервов'],
            ['name' => 'Мясная морозилка',    'type' => 'морозильная камера', 'temp_zone_id' => $frozen->id, 'description' => 'Хранение замороженного мяса и птицы'],
            ['name' => 'Овощной склад',       'type' => 'овощехранилище',     'temp_zone_id' => $veg->id,    'description' => 'Свежие овощи и фрукты'],
            ['name' => 'Молочная камера',     'type' => 'холодильная камера', 'temp_zone_id' => $cold->id,   'description' => 'Молочные продукты, яйца, гастрономия'],
            ['name' => 'Рыбный склад',        'type' => 'морозильная камера', 'temp_zone_id' => $frozen->id, 'description' => 'Замороженная рыба и морепродукты'],
            ['name' => 'Сухой склад',         'type' => 'склад',              'temp_zone_id' => $dry->id,    'description' => 'Сухие продукты, мука, крупы'],
            ['name' => 'Винный погреб',       'type' => 'погреб',             'temp_zone_id' => $cold->id,   'description' => 'Хранение алкогольных напитков'],
            ['name' => 'Кондитерский склад',  'type' => 'холодильная камера', 'temp_zone_id' => $cold->id,   'description' => 'Торты, пирожные, десерты'],
            ['name' => 'Склад заморозки',     'type' => 'морозильная камера', 'temp_zone_id' => $frozen->id, 'description' => 'Долгосрочная заморозка продуктов'],
            ['name' => 'Барная стойка',       'type' => 'бар',                'temp_zone_id' => $dry->id,    'description' => 'Оперативное хранение напитков'],
        ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}
