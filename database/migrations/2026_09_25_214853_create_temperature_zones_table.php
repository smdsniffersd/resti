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
        Schema::create('temperature_zones', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->decimal('min_temp', 5, 2);
            $table->decimal('max_temp', 5, 2);
            $table->text('description')->nullable();
            $table->index('name');
        });
        DB::statement('ALTER TABLE temperature_zones ADD CONSTRAINT check_temp_zone CHECK(max_temp >= min_temp);');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temperature_zones');
    }
};
