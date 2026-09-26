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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('contact_face', 50);
            $table->string('post', 50);
            $table->string('phone', 50);
            $table->string('email', 50);
            $table->string('web')->nullable();
            $table->string('legal_address', 50);
            $table->string('facts_address', 50);
            $table->string('city', 50);
            $table->string('postal_code', 50);
            $table->string('requisites', 50);
            $table->string('tax_id', 50);
            $table->string('kpp_number', 50);
            $table->string('settlement_account', 50);
            $table->string('bank', 50);
            $table->index('name');
            $table->index('contact_face');
            $table->index('city');
            $table->index('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
