<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('second_name', 50);
            $table->date('born_date')->nullable();
            $table->string('phone', 50)->unique();
            $table->string('email', 50)->unique()->nullable();
            $table->decimal('discount_percent', 5, 2)->default(0);
            $table->integer('quantity_visited')->default(0);
            $table->index('discount_percent');
            $table->index('quantity_visited');
            
        });
        DB::statement('ALTER TABLE clients ADD CONSTRAINT check_clients_born_date CHECK(EXTRACT(year FROM age(CURRENT_DATE, born_date)) >= 18)');
        DB::statement('ALTER TABLE clients ADD CONSTRAINT check_clients_discount_percent CHECK(discount_percent BETWEEN 0 AND 100)');
        DB::statement('ALTER TABLE clients ADD CONSTRAINT check_clients_quantity_visited CHECK(quantity_visited >= 0)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
