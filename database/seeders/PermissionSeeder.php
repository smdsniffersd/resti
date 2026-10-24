<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [

            ['module' => 'users',     'action' => 'view',   'description' => 'Просмотр пользователей'],
            ['module' => 'users',     'action' => 'create', 'description' => 'Создание пользователей'],
            ['module' => 'users',     'action' => 'edit',   'description' => 'Редактирование пользователей'],
            ['module' => 'users',     'action' => 'delete', 'description' => 'Удаление пользователей'],

            ['module' => 'roles',     'action' => 'view',   'description' => 'Просмотр ролей'],
            ['module' => 'roles',     'action' => 'create', 'description' => 'Создание ролей'],
            ['module' => 'roles',     'action' => 'edit',   'description' => 'Редактирование ролей'],
            ['module' => 'roles',     'action' => 'delete', 'description' => 'Удаление ролей'],

            ['module' => 'dishes',    'action' => 'view',   'description' => 'Просмотр блюд'],
            ['module' => 'dishes',    'action' => 'create', 'description' => 'Создание блюд'],
            ['module' => 'dishes',    'action' => 'edit',   'description' => 'Редактирование блюд'],
            ['module' => 'dishes',    'action' => 'delete', 'description' => 'Удаление блюд'],

            ['module' => 'orders',    'action' => 'view',   'description' => 'Просмотр заказов'],
            ['module' => 'orders',    'action' => 'create', 'description' => 'Создание заказов'],
            ['module' => 'orders',    'action' => 'edit',   'description' => 'Редактирование заказов'],
            ['module' => 'orders',    'action' => 'delete', 'description' => 'Удаление заказов'],

            ['module' => 'products',  'action' => 'view',   'description' => 'Просмотр продуктов'],
            ['module' => 'products',  'action' => 'create', 'description' => 'Создание продуктов'],
            ['module' => 'products',  'action' => 'edit',   'description' => 'Редактирование продуктов'],
            ['module' => 'products',  'action' => 'delete', 'description' => 'Удаление продуктов'],

            ['module' => 'reports',   'action' => 'view',   'description' => 'Просмотр отчётов'],
            ['module' => 'reports',   'action' => 'export', 'description' => 'Экспорт отчётов'],

        ];
        foreach($permissions as $permission){
            Permission::create($permission);
        }
    }
}
