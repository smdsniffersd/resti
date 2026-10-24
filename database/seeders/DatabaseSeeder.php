<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
        UnitSeeder::class, 
        TemperatureZoneSeeder::class,
        WorkShopSeeder::class,
        MenuCategorySeeder::class,
        RTableSeeder::class,
        RoleSeeder::class,
        PermissionSeeder::class,
        RolePermissionSeeder::class,
        DebitReasonSeeder::class,
        SupplierSeeder::class,
        LocationSeeder::class
        ]);
    }
}
