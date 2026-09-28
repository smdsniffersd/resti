<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('remains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->restrictOnDelete();
            $table->foreignId('location_id')->constrained('locations')->restrictOnDelete();
            $table->foreignId('supplies_id')->nullable()->constrained('supplies');
            $table->decimal('quantity', 10, 3);
            $table->decimal('price', 10, 2)->default(0);
            $table->timestamp('last_update')->useCurrent();
            $table->unique(['product_id', 'location_id', 'supplies_id']);
            $table->index('location_id');
            $table->index('supplies_id');
            $table->index('last_update');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remains');
    }
};
