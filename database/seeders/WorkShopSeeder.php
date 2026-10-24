<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Workshop;

class WorkShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workshops = [
            ['name' => 'Горячий цех',        'type' => 'основной'],
            ['name' => 'Холодный цех',       'type' => 'основной'],
            ['name' => 'Мясной цех',         'type' => 'основной'],
            ['name' => 'Овощной цех',        'type' => 'доготовочный'],
            ['name' => 'Кондитерский цех',   'type' => 'основной'],
            ['name' => 'Моечный цех',        'type' => 'вспомогательный'],
            ['name' => 'Рыбный цех',         'type' => 'основной'],
            ['name' => 'Тестомесильный цех', 'type' => 'доготовочный'],
            ['name' => 'Заготовочный цех',   'type' => 'доготовочный'],
            ['name' => 'Бар',                'type' => 'вспомогательный'],
        ];
        foreach ($workshops as $workshop) {
            Workshop::create($workshop);
        }
    }
}
