<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DebitReason;

class DebitReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reasons = [
            ['name' => 'Инвентаризация', 'type' => 'inventory',   'need_confirmation' => false, 'description' => 'Списание по результатам инвентаризации'],
            ['name' => 'Брак',           'type' => 'damage',      'need_confirmation' => true,  'description' => 'Продукт испорчен или поврежден'],
            ['name' => 'Просрочка',      'type' => 'expiry',      'need_confirmation' => true,  'description' => 'Истек срок годности'],
            ['name' => 'Производство',   'type' => 'production',  'need_confirmation' => false, 'description' => 'Списание в производство'],
            ['name' => 'Потеря',         'type' => 'loss',        'need_confirmation' => true,  'description' => 'Потеря продукта (кража, утеря)'],
            ['name' => 'Ошибка приёма',  'type' => 'error',       'need_confirmation' => true,  'description' => 'Ошибка при приемке товара'],
            ['name' => 'Возврат',        'type' => 'return',      'need_confirmation' => false, 'description' => 'Возврат некачественного товара'],
            ['name' => 'Пересортица',    'type' => 'reclass',     'need_confirmation' => true,  'description' => 'Ошибка в сортировке'],
            ['name' => 'Дегустация',     'type' => 'degustation', 'need_confirmation' => false, 'description' => 'Списание на дегустацию'],
        ];
        foreach($reasons as $reason){
            DebitReason::create($reason);
        }
    }
}
