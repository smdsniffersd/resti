<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'name' => 'ООО "ПродуктСервис"',
                'contact_face' => 'Иванов Иван',
                'post' => 'Менеджер',
                'phone' => '+7(495)123-45-67',
                'email' => 'info@product.ru',
                'web' => 'www.product.ru',
                'legal_address' => 'г. Москва, ул. Ленина, д.10',
                'facts_address' => 'г. Москва, ул. Ленина, д.10',
                'city' => 'Москва',
                'postal_code' => '123456',
                'requisites' => 'реквизиты',
                'tax_id' => '7712345678',
                'kpp_number' => '771201001',
                'settlement_account' => '40702810900000012345',
                'bank' => 'Тинькофф',
            ],
            [
                'name' => 'ООО "Мясной Двор"',
                'contact_face' => 'Петров Петр',
                'post' => 'Директор',
                'phone' => '+7(495)987-65-43',
                'email' => 'info@meat.ru',
                'web' => 'www.meat.ru',
                'legal_address' => 'г. Москва, ул. Тверская, д.5',
                'facts_address' => 'г. Москва, ул. Тверская, д.5',
                'city' => 'Москва',
                'postal_code' => '654321',
                'requisites' => 'реквизиты',
                'tax_id' => '7798765432',
                'kpp_number' => '771201002',
                'settlement_account' => '40702810900000054321',
                'bank' => 'Сбербанк',
            ],
            [
                'name' => 'ООО "Молочная Ферма"',
                'contact_face' => 'Сидорова Анна',
                'post' => 'Менеджер',
                'phone' => '+7(495)111-22-33',
                'email' => 'info@milk.ru',
                'web' => 'www.milk.ru',
                'legal_address' => 'г. Москва, ул. Садовая, д.15',
                'facts_address' => 'г. Москва, ул. Садовая, д.15',
                'city' => 'Москва',
                'postal_code' => '111222',
                'requisites' => 'реквизиты',
                'tax_id' => '7711122233',
                'kpp_number' => '771201003',
                'settlement_account' => '40702810900000011122',
                'bank' => 'Альфа-Банк',
            ],
        ];
        foreach($suppliers as $supplier){
            Supplier::create($supplier);
        }
    }
}
