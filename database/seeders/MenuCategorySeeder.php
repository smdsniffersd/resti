<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MenuCategory;

class MenuCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryes = [

            ['name' => 'Супы'],
            ['name' => 'Горячие блюда'],
            ['name' => 'Гарниры'],
            ['name' => 'Десерты'],
            ['name' => 'Хлебобулочные изделия'],
            ['name' => 'Напитки'],
            ['name' => 'Салаты'],
        ];
        foreach($categoryes as $category){
            MenuCategory::create($category);
        }
    }
}
