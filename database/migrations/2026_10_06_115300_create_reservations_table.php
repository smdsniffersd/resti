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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable()->constrained('clients')->restrictOnDelete();
            $table->foreignId('table_id')->constrained('r_tables')->restrictOnDelete();
            $table->foreignId('waiter_id')->nullable()->constrained('personal', 'user_id')->restrictOnDelete();
            $table->timestamp('date_time_on');
            $table->timestamp('reservation_at')->useCurrent();
            $table->index('client_id');
            $table->index('table_id');
            $table->index('waiter_id');
            $table->index('reservation_at');
            $table->index('date_time_on');
        });
        DB::statement("ALTER TABLE reservations ADD CONSTRAINT check_reservations_time CHECK(date_time_on > reservation_at)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
