<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kg = Unit::create([
            'name' => 'Килограмм',
            'short_name' => 'кг',
            'category' => 'weight',
            'base_unit_id' => null,
            'conversion_factor' => 1,
        ]);

        $l = Unit::create([
            'name' => 'Литр',
            'short_name' => 'л',
            'category' => 'volume',
            'base_unit_id' => null,
            'conversion_factor' => 1,
        ]);

        $pcs = Unit::create([
            'name' => 'Штука',
            'short_name' => 'шт',
            'category' => 'piece',
            'base_unit_id' => null,
            'conversion_factor' => 1,
        ]);

        $pack = Unit::create([
            'name' => 'Упаковка',
            'short_name' => 'уп',
            'category' => 'package',
            'base_unit_id' => null,
            'conversion_factor' => 1,
        ]);

        Unit::create([
            'name' => 'Грамм',
            'short_name' => 'г',
            'category' => 'weight',
            'base_unit_id' => $kg->id,
            'conversion_factor' => 0.001,
        ]);

        Unit::create([
            'name' => 'Миллилитр',
            'short_name' => 'мл',
            'category' => 'volume',
            'base_unit_id' => $l->id,
            'conversion_factor' => 0.001,
        ]);

        Unit::create([
            'name' => 'Дюжина',
            'short_name' => 'дюж',
            'category' => 'piece',
            'base_unit_id' => $pcs->id,
            'conversion_factor' => 12,
        ]);

        Unit::create([
            'name' => 'Бутылка',
            'short_name' => 'бут',
            'category' => 'package',
            'base_unit_id' => $pack->id,
            'conversion_factor' => 1,
        ]);

        Unit::create([
            'name' => 'Ящик',
            'short_name' => 'ящ',
            'category' => 'package',
            'base_unit_id' => $pack->id,
            'conversion_factor' => 20,
        ]);


    }
}
