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
        Schema::create('supplies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->constrained('products')->restrictOnDelete();
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers')->restrictOnDelete();
            $table->string('document_number', 50);
            $table->date('receipt_date')->useCurrent();
            $table->date('expiry_date')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->string('created_by', 50);
            $table->decimal('quantity', 5, 2);
            $table->decimal('price', 10, 2)->default(0);
            $table->foreignId('unit_id')->nullable()->constrained('units')->restrictOnDelete();
            $table->string('status', 50)->default('active');
            $table->text('description')->nullable();

            $table->index('created_at');
            $table->index('expiry_date');
            $table->index('product_id');
            $table->index('status');
            $table->index('supplier_id');
        });

        DB::statement("ALTER TABLE supplies ADD CONSTRAINT check_supplies_expiry CHECK (expiry_date IS NULL OR expiry_date > receipt_date)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplies');
    }
};
