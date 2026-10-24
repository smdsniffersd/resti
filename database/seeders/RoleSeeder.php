<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [

            ['name' => 'Администратор', 'code' => 'admin',       'is_system' => true],
            ['name' => 'Директор',      'code' => 'director',    'is_system' => false],
            ['name' => 'Шеф-повар',     'code' => 'chef',        'is_system' => false],
            ['name' => 'Повар',         'code' => 'cook',        'is_system' => false],
            ['name' => 'Кладовщик',     'code' => 'storekeeper', 'is_system' => false],
            ['name' => 'Официант',      'code' => 'waiter',      'is_system' => false],
            ['name' => 'Бухгалтер',     'code' => 'accountant',  'is_system' => false],
            ['name' => 'Менеджер',      'code' => 'manager',     'is_system' => false],

        ];
        foreach($roles as $role){
            Role::create($role);
        }
    }
}
