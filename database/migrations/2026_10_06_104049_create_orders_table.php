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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('table_id')->constrained('r_tables');
            $table->foreignId('waiter_id')->nullable()->constrained('personal', 'user_id');
            $table->timestamp('order_at')->useCurrent();
            $table->timestamp('order_to_time')->nullable();
            $table->string('status', 20)->default('active');
            $table->index('order_at');
            $table->index('order_to_time');
            $table->index('status');
            $table->index('waiter_id');
            $table->index('table_id');
        });
        DB::statement("ALTER TABLE orders ADD CONSTRAINT check_orders_time CHECK(order_to_time > order_at)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
