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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('type', 50);
            $table->foreignId('workshop_id')->constrained('workshops');
            $table->foreignId('warehouse_id')->nullable()->constrained('locations')->nullOnDelete();
            $table->foreignId('unit_id')->constrained('units');
            $table->decimal('weight', 8, 3);
            $table->decimal('price', 10, 2);
            $table->string('status', 20)->default('active');
            $table->text('description')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->index('name');
            $table->index('type');
            $table->index('status');
            $table->index('price');
            $table->index('workshop_id');
            $table->index('warehouse_id');
        });
        DB::statement("ALTER TABLE dishes ADD COLUMN cooking_time INTERVAL NOT NULL");
        DB::statement("ALTER TABLE dishes ADD CONSTRAINT check_dishes_time CHECK(cooking_time > '00:00:00')");
        DB::statement("ALTER TABLE dishes ADD CONSTRAINT check_dishes_price CHECK(price > 0)");
        DB::statement("ALTER TABLE dishes ADD CONSTRAINT check_dishes_weight CHECK(weight >0)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
