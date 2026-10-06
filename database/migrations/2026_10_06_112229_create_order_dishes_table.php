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
        Schema::create('order_dishes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->restrictOnDelete();
            $table->foreignId('dish_id')->constrained('dishes')->restrictOnDelete();
            $table->decimal('quantity', 8, 3);
            $table->decimal('const_price', 10, 2);
            $table->decimal('sale_price', 10, 2);
            $table->string('status', 50)->default('active');
            $table->text('message')->nullable();
            $table->index('order_id');
            $table->index('dish_id');
            $table->index('status');
            $table->index('sale_price');
            $table->index('const_price');
        });
        DB::statement("ALTER TABLE order_dishes ADD CONSTRAINT check_order_dishes_quantity CHECK (quantity > 0)");
        DB::statement("ALTER TABLE order_dishes ADD CONSTRAINT check_order_dishes_cprice CHECK (const_price > 0)");
        DB::statement("ALTER TABLE order_dishes ADD CONSTRAINT check_order_dishes_sprice CHECK (sale_price > 0)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_dishes');
    }
};
