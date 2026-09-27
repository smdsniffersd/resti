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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->string('type', 50);
            $table->foreignId('temp_zone_id')->constrained('temperature_zones');
            $table->foreignId('responsible_person_id')->nullable()->constrained('personal', 'user_id');
            $table->text('description')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->boolean('is_active')->default(true);
            $table->index('is_active');
            $table->index('responsible_person_id');
            $table->index('temp_zone_id');
            $table->index('type');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
