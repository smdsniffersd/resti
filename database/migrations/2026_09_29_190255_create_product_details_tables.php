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
        Schema::create('alcohol_details', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();

            $table->decimal('percentage_of_fortress', 5, 2);
            $table->string('alcohol_type');
            $table->decimal('volume_ml', 10, 2);
            $table->index('alcohol_type');
        });
        DB::statement("ALTER TABLE alcohol_details ADD CONSTRAINT check_alcohol_details_percentage CHECK (percentage_of_fortress >= 0 AND <= 100)");
        DB::statement("ALTER TABLE alcohol_details ADD CONSTRAINT check_alcohol_details_volume CHECK (volume_ml > 0)");

        Schema::create('liquid_milk_details', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();

            $table->decimal('percentage_fats', 5, 2);
            $table->decimal('volume_ml', 10, 2);
            $table->boolean('pasteurized')->default(false);
            $table->index('percentage_fats');
        });

        DB::statement("ALTER TABLE liquid_milk_details ADD CONSTRAINT check_liquid_milk_details_percentage CHECK (percentage_of_fortress >= 0 AND <= 50)");
        DB::statement("ALTER TABLE liquid_milk_details ADD CONSTRAINT check_liquid_milk_details_volume CHECK (volume_ml > 0)");

        Schema::create('solid_dairy_details', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();

            $table->decimal('percentage_fats', 5, 2);
            $table->decimal('weight_grams', 10, 2);

            $table->index('percentage_fats');
        });
        DB::statement("ALTER TABLE  solid_dairy_details ADD CONSTRAINT check_solid_dairy_details_percentage CHECK (percentage_of_fortress >= 0 AND <= 50)");
        DB::statement("ALTER TABLE  solid_dairy_details ADD CONSTRAINT check_solid_dairy_details_volume CHECK (volume_ml > 0)");


        Schema::create('meat_poultry_details', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();

            $table->string('animal_type', 50);
            $table->string('cut_type', 50);
            $table->decimal('percentage_fats', 5, 2);
            $table->boolean('is_frozen')->default(false);
            $table->decimal('storage_days', 10, 2);

            $table->index('animal_type');
            $table->index('cut_type');
            $table->index('is_frozen');
        });
        DB::statement("ALTER TABLE  meat_poultry_details ADD CONSTRAINT check_meat_poultry_details_percentage CHECK (percentage_fats >= 0 AND <= 50)");
        DB::statement("ALTER TABLE  meat_poultry_details ADD CONSTRAINT check_meat_poultry_details_volume CHECK (storage_days > 0)");

        Schema::create('fish_seafood_details', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();

            $table->string('fish_type', 50);
            $table->string('cutting_type', 50);
            $table->boolean('is_frozen')->default(false);
            $table->boolean('is_wild_caught')->default(true);
            $table->decimal('stograge_days', 5, 2);

            $table->index('fish_type');
            $table->index('cutting_type');
            $table->index('is_frozen');
            $table->index('is_wild_caught');
        });

        DB::statement("ALTER TABLE  fish_seafood_details ADD CONSTRAINT check_fish_seafood_details_days CHECK (stograge_days > 0)");

        Schema::create('vegetables_fruits_details', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();

            $table->string('category', 50);
            $table->boolean('is_seasonal')->default('false');
            $table->string('stograge_conditions', 100);
            $table->string('ripeness_level', 20);
            $table->boolean('is_organic')->default(false);

            $table->index('category');
            $table->index('is_seasonal');
            $table->index('ripeness_level');
            $table->index('is_organic');
        });
        Schema::create('grocery_details', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();

            $table->decimal('package_weight', 10, 2);
            $table->string('package_type', 50);
            $table->boolean('is_bulk')->default(false);
            $table->integer('shelf_life_days');
            $table->string('stograge_conditions', 100);

            $table->index('package_type');
        });
        DB::statement("ALTER TABLE  grocery_details ADD CONSTRAINT check_grocery_details_weight CHECK (package_weight > 0)");
        Schema::create('frozen_details', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();

            $table->decimal('freezing_temp', 5, 2);
            $table->integer('max_stograge_days');
            $table->integer('thawing_time_minutes');
            $table->boolean('is_prefrozen')->default(true);
            $table->index('is_prefrozen');
        });
        Schema::create('bakery_details', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();

            $table->string('flour_type ', 50);
            $table->decimal('weight_loaf', 10, 2);
            
            $table->index('is_prefrozen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alcohol_details');
    }
};
