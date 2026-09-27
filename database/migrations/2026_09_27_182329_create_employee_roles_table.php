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
        Schema::create('employee_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->nullable()->constrained('personal', 'user_id');
            $table->foreignId('role_id')->nullable()->constrained('roles');
            $table->date('assigned_at')->nullable();
            $table->foreignId('assigned_by')->nullable()->constrained('personal', 'user_id');
            $table->unique(['employee_id', 'role_id']);
            $table->index('role_id');
            $table->index('assigned_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_roles');
    }
};
