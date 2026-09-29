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
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->constrained('products')->restrictOnDelete();
            $table->foreignId('supplies_id')->nullable()->constrained('supplies')->nullOnDelete();
            $table->string('operation_type', 50);
            $table->decimal('quantity', 10, 3);
            $table->string('document_type', 50);
            $table->timestamp('date_operation')->nullable()->useCurrent();
            $table->foreignId('created_by_id')->nullable()->constrained('personal', 'user_id')->nullOnDelete();
            $table->foreignId('from_location_id')->nullable()->constrained('locations')->nullOnDelete();
            $table->foreignId('to_location_id')->nullable()->constrained('locations')->nullOnDelete();
            $table->foreignId('debit_reason_id')->nullable()->constrained('debit_reasons')->nullOnDelete();
            $table->index('date_operation');
            $table->index('from_location_id');
            $table->index('product_id');
            $table->index('supplies_id');
            $table->index('to_location_id');
            $table->index('operation_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operations');
    }
};
