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
            $table->foreignId('product_id')->primary()->constrained('products')->cascadeOnDelete();

            $table->decimal('percentage_of_fortress', 5, 2);
            $table->string('alcohol_type');
            $table->decimal('volume_ml', 10, 2);
            $table->index('alcohol_type');
        });
        DB::statement("ALTER TABLE alcohol_details ADD CONSTRAINT check_alcohol_details_percentage CHECK (percentage_of_fortress >= 0 AND <= 100)");
        DB::statement("ALTER TABLE alcohol_details ADD CONSTRAINT check_alcohol_details_volume CHECK (volume_ml >= 0)");

        Schema::create('liquid_milk_details', function (Blueprint $table) {
            $table->foreignId('product_id')->primary()->constrained('products')->cascadeOnDelete();

            $table->decimal('fat_percentage', 5, 2);
            $table->decimal('volume_ml', 10, 2);
            $table->boolean('pasteurized')->default(false);
            $table->index('fat_percentage');
        });

        DB::statement("ALTER TABLE liquid_milk_details ADD CONSTRAINT check_liquid_milk_details_percentage CHECK (fat_percentage >= 0 AND <= 50)");
        DB::statement("ALTER TABLE liquid_milk_details ADD CONSTRAINT check_liquid_milk_details_volume CHECK (volume_ml >= 0)");

        Schema::create('solid_dairy_details', function (Blueprint $table) {
            $table->foreignId('product_id')->primary()->constrained('products')->cascadeOnDelete();

            $table->decimal('fat_percentage', 5, 2);
            $table->decimal('weight_grams', 10, 2);

            $table->index('fat_percentage');
        });
        DB::statement("ALTER TABLE  solid_dairy_details ADD CONSTRAINT check_solid_dairy_details_percentage CHECK (fat_percentage >= 0 AND <= 50)");
        DB::statement("ALTER TABLE  solid_dairy_details ADD CONSTRAINT check_solid_dairy_details_volume CHECK (weight_grams > 0)");


        Schema::create('meat_poultry_details', function (Blueprint $table) {
            $table->foreignId('product_id')->primary()->constrained('products')->cascadeOnDelete();

            $table->string('animal_type', 50);
            $table->string('cut_type', 50)->nullable();
            $table->decimal('fat_percentage', 5, 2);
            $table->boolean('is_frozen')->default(false);
            $table->integer('storage_days');

        });
        DB::statement("ALTER TABLE  meat_poultry_details ADD CONSTRAINT check_meat_poultry_details_percentage CHECK (fat_percentage >= 0 AND fat_percentage <= 50)");
        DB::statement("ALTER TABLE  meat_poultry_details ADD CONSTRAINT check_meat_poultry_details_volume CHECK (storage_days > 0)");

        Schema::create('fish_seafood_details', function (Blueprint $table) {
            $table->foreignId('product_id')->primary()->constrained('products')->cascadeOnDelete();

            $table->string('fish_type', 50);
            $table->string('cutting_type', 50)->nullable();
            $table->boolean('is_frozen')->default(false);
            $table->boolean('is_wild_caught')->default(true);
            $table->integer('storage_days');

            $table->index('fish_type');
            $table->index('cutting_type');
        });

        DB::statement("ALTER TABLE  fish_seafood_details ADD CONSTRAINT check_fish_seafood_details_days CHECK (storage_days > 0)");

        Schema::create('vegetables_fruits_details', function (Blueprint $table) {
            $table->foreignId('product_id')->primary()->constrained('products')->cascadeOnDelete();

            $table->string('category', 50);
            $table->boolean('is_seasonal')->default(false);
            $table->boolean('is_organic')->default(false);

            $table->index('category');
        });
        Schema::create('grocery_details', function (Blueprint $table) {
            $table->foreignId('product_id')->primary()->constrained('products')->cascadeOnDelete();

            $table->decimal('package_weight', 10, 2);
            $table->string('package_type', 50);
            $table->boolean('is_bulk')->default(false);
            $table->integer('shelf_life_days');

            $table->index('package_type');
        });
        DB::statement("ALTER TABLE  grocery_details ADD CONSTRAINT check_grocery_details_weight CHECK (package_weight >= 0)");
        Schema::create('frozen_details', function (Blueprint $table) {
            $table->foreignId('product_id')->primary()->constrained('products')->cascadeOnDelete();

            $table->decimal('freezing_temp', 5, 2);
            $table->integer('max_storage_days');
            $table->integer('thawing_time_minutes');
            $table->boolean('is_prefrozen')->default(true);
        });
        Schema::create('bakery_details', function (Blueprint $table) {
            $table->foreignId('product_id')->primary()->constrained('products')->cascadeOnDelete();

            $table->string('flour_type', 50);
            $table->decimal('weight_loaf', 10, 2);
            $table->integer('shelf_life_hours');
            $table->text('contains_allergens')->nullable();

            $table->index('flour_type');
        });
        DB::statement("ALTER TABLE  bakery_details ADD CONSTRAINT check_bakery_details_weight CHECK (weight_loaf >= 0)");

        Schema::create('beverages_details', function (Blueprint $table) {
            $table->foreignId('product_id')->primary()->constrained('products')->cascadeOnDelete();

            $table->string('beverage_type', 50);
            $table->decimal('volume_ml', 10, 2);
            $table->boolean('is_carbonated')->default(false);
            $table->string('brand', 50)->nullable();

            $table->index('beverage_type');
            $table->index('brand');
        });
        DB::statement("ALTER TABLE  beverages_details ADD CONSTRAINT check_beverages_details_volume CHECK (volume_ml >= 0)");

        Schema::create('sauces_spices_details', function (Blueprint $table) {
            $table->foreignId('product_id')->primary()->constrained('products')->cascadeOnDelete();
            $table->string('spice_type', 50);
            $table->integer('spiciness_level');
            $table->decimal('volume_ml', 10, 2);
            $table->boolean('is_liquid')->default(true);


            $table->index('spice_type');
            $table->index('spiciness_level');
        });
        DB::statement("ALTER TABLE  sauces_spices_details ADD CONSTRAINT check_sauces_spices_details_spiciness CHECK (spiciness_level >= 0 AND <= 10)");
        DB::statement("ALTER TABLE  sauces_spices_details ADD CONSTRAINT check_sauces_spices_details_volume CHECK (volume_ml >= 0)");
        Schema::create('confectionery_details', function (Blueprint $table) {
            $table->foreignId('product_id')->primary()->constrained('products')->cascadeOnDelete();

            $table->string('dessert_type', 50);
            $table->decimal('weight_grams', 10, 2);
            $table->integer('shelf_life_hours');
            $table->boolean('requires_refrigeration')->default(false);


            $table->index('dessert_type');
            $table->index('requires_refrigeration');
        });
        DB::statement("ALTER TABLE  confectionery_details ADD CONSTRAINT check_confectionery_details_weight CHECK (weight_grams > 0)");
        DB::statement("ALTER TABLE  confectionery_details ADD CONSTRAINT check_confectionery_details_shelf CHECK (shelf_life_hours >= 0)");
        Schema::create('eggs_details', function (Blueprint $table) {
            $table->foreignId('product_id')->primary()->constrained('products')->cascadeOnDelete();
            $table->string('egg_size', 10);
            $table->integer('quantity_per_pack');
            $table->boolean('is_liquid')->default(false);
            $table->boolean('is_pasteurized')->default(false);


            $table->index('egg_size');
            $table->index('quantity_per_pack');
        });
        DB::statement("ALTER TABLE  eggs_details ADD CONSTRAINT check_eggs_details_quantity CHECK (quantity_per_pack >= 0)");
        Schema::create('oils_fats_details', function (Blueprint $table) {
            $table->foreignId('product_id')->primary()->constrained('products')->cascadeOnDelete();

            $table->string('oil_type', 50);
            $table->decimal('volume_ml', 10, 2);
            $table->decimal('weight_grams', 10, 2);
            $table->decimal('fat_percentage', 5, 2);

            $table->index('oil_type');
            $table->index('fat_percentage');
        });
        DB::statement("ALTER TABLE  oils_fats_details ADD CONSTRAINT check_oils_volume CHECK (volume_ml >= 0)");
        DB::statement("ALTER TABLE  oils_fats_details ADD CONSTRAINT check_oils_weight CHECK (weight_grams > 0)");
        DB::statement("ALTER TABLE  oils_fats_details ADD CONSTRAINT check_oils_percentage CHECK (fat_percentage >= 0)");
    
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::dropIfExists('alcohol_details');
    Schema::dropIfExists('liquid_milk_details');
    Schema::dropIfExists('solid_dairy_details');
    Schema::dropIfExists('meat_poultry_details');
    Schema::dropIfExists('fish_seafood_details');
    Schema::dropIfExists('vegetables_fruits_details');
    Schema::dropIfExists('grocery_details');
    Schema::dropIfExists('frozen_details');
    Schema::dropIfExists('bakery_details');
    Schema::dropIfExists('beverages_details');
    Schema::dropIfExists('sauces_spices_details');
    Schema::dropIfExists('confectionery_details');
    Schema::dropIfExists('eggs_details');
    Schema::dropIfExists('oils_fats_details');
}
};
