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
        Schema::create('dish_structures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->restrictOnDelete();
            $table->foreignId('dish_id')->constrained('dishes');
            $table->decimal('quantity', 5, 2);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->unique(['product_id', 'dish_id']);
            $table->index('dish_id');
        });
        DB::statement("ALTER TABLE dish_structures ADD CONSTRAINT check_dish_structures_quantity CHECK(quantity > 0)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dish_structures');
    }
};
