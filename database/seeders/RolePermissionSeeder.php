<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::where('code', 'admin')->first();
        if ($admin) {
            $admin->permissions()->sync(Permission::all()->pluck('id'));
        }

        $director = Role::where('code', 'director')->first();
        if ($director) {
            $director->permissions()->sync(
                Permission::where('module', '!=', 'users')
                    ->where('module', '!=', 'roles')
                    ->pluck('id')
            );
        }

        $chef = Role::where('code', 'chef')->first();
        if ($chef) {
            $chef->permissions()->sync(
                Permission::whereIn('module', ['dishes', 'reports'])->pluck('id')
            );
        }

        $cook = Role::where('code', 'cook')->first();
        if ($cook) {
            $cook->permissions()->sync(
                Permission::where('module', 'dishes')
                    ->where('action', 'view')
                    ->pluck('id')
            );
        }

        $storekeeper = Role::where('code', 'storekeeper')->first();
        if ($storekeeper) {
            $storekeeper->permissions()->sync(
                Permission::where('module', 'products')->pluck('id')
            );
        }

        $waiter = Role::where('code', 'waiter')->first();
        if ($waiter) {
            $waiter->permissions()->sync(
                Permission::whereIn('module', ['orders', 'dishes'])
                    ->whereIn('action', ['view', 'create'])
                    ->pluck('id')
            );
        }

        $accountant = Role::where('code', 'accountant')->first();
        if ($accountant) {
            $accountant->permissions()->sync(
                Permission::where('module', 'reports')
                    ->whereIn('action', ['view', 'export'])
                    ->pluck('id')
            );
        }

        $manager = Role::where('code', 'manager')->first();
        if ($manager) {
            $manager->permissions()->sync(
                Permission::whereIn('module', ['orders', 'dishes'])->pluck('id')
            );
        }
    }
}