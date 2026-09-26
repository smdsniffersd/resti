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
        Schema::create('r_tables', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->string('type', 50);
            $table->integer('places');
            $table->boolean('busy')->default(false);
            $table->index('type');
            $table->index('busy');
            $table->index('places');
        });

        DB::statement('ALTER TABLE r_tables ADD CONSTRAINT check_r_tables_places CHECK(places >= 0);');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r_tables');
    }
};
